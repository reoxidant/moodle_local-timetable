/**
 * Used to get schedule of discipline
 *
 * @package timetable
 */

define(
    [
        'jquery',
        'core/ajax',
        'local_timetable/selectors',
        'core/notification'
    ], function (
        $,
        Ajax,
        ItemSelectors,
        notification
    ) {

        let addLoaderToPage = function (root) {
            $(root).append($('<span>', {
                class: "overlay-icon-container hidden",
                "data-region": "overlay-icon-container"
            }).append($('<span>', {
                class: "loading-icon icon-no-margin"
            }).append($('<i>', {
                class: "icon fa fa-circle-o-notch fa-spin fa-fw",
                title: "Загрузка",
                "aria-label": "Загрузка"
            }))));
        }

        let startLoading = function (root) {
            let loadingIconContainer = root.find(ItemSelectors.containers.loadingIcon);
            loadingIconContainer.removeClass('hidden');
        };

        let stopLoading = function (root) {
            let loadingIconContainer = root.find(ItemSelectors.containers.loadingIcon);
            loadingIconContainer.addClass('hidden');
        };

        let loadTimetable = function (role, root = $(ItemSelectors.containers.pageContent), content, setValMinAndMaxDate, curMinAndMaxDate) {
            $.ajax({
                type: "POST",
                data: {role: role, setValMinAndMaxDate: setValMinAndMaxDate, curMinAndMaxDate: curMinAndMaxDate},
                url: "ajax.php",
                beforeSend: function () {
                    startLoading(root);
                },
                complete: function () {
                    stopLoading(root);
                    registerEventListeners(role);
                    if (setValMinAndMaxDate) {
                        $(ItemSelectors.calendar.inputStart).val(setValMinAndMaxDate[0]);
                        $(ItemSelectors.calendar.inputEnd).val(setValMinAndMaxDate[1]);
                    }
                },
                success: function (data) {
                    content.empty();
                    content.append(data);
                },
                dataType: "html",
                cache: "false",
                error: function () {
                    notification.addNotification({
                        message: "Не найдено ниодной дисциплины в заданом диапазоне дат.",
                        type: "error"
                    });
                }
            });
        }

        let registerEventListeners = function (role) {
            $(ItemSelectors.containers.calendar).change(function (e) {
                let setValMinAndMaxDate = [
                    $(ItemSelectors.calendar.inputStart).val(),
                    $(ItemSelectors.calendar.inputEnd).val()
                ];
                let curMinAndMaxDate =
                    [
                        $(ItemSelectors.calendar.inputStart).attr('min'),
                        $(ItemSelectors.calendar.inputStart).attr('max')
                    ];
                loadTimetable(role, $(ItemSelectors.containers.pageContent), $(ItemSelectors.containers.mainContent), setValMinAndMaxDate, curMinAndMaxDate);
            });
        }

        return {
            init: function (role) {
                addLoaderToPage(ItemSelectors.containers.pageContent);
                loadTimetable(role, $(ItemSelectors.containers.pageContent), $(ItemSelectors.containers.mainContent));
            }
        }
    }
);