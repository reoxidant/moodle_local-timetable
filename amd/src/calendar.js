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

        let loadTimetable = function (role, root = $(ItemSelectors.containers.pageContent), content, setValMinAndMaxDate) {
            let dbMaxDate = getUserPreference($(ItemSelectors.calendar.wrapper).attr('userid'), "local_timetable_user_preference_min");
            let dbMinDate = getUserPreference($(ItemSelectors.calendar.wrapper).attr('userid'), "local_timetable_user_preference_max");

            if (dbMaxDate && dbMinDate) {
                setValMinAndMaxDate = [dbMaxDate, dbMinDate];
            }

            $.ajax({
                type: "POST",
                data: {role: role, setValMinAndMaxDate: setValMinAndMaxDate},
                url: "ajax.php",
                beforeSend: function () {
                    startLoading(root);
                },
                complete: function () {
                    stopLoading(root);
                    registerEventListeners(role);
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

        let updateUserPreference = function (type, value) {
            let request = {
                methodname: 'core_user_update_user_preferences',
                args: {
                    preferences: [
                        {
                            type: type,
                            value: value
                        }
                    ]
                }
            }
            Ajax.call([request])[0].then(function (data) {
                console.log(data);
            })
                .fail(notification.exception);
        }

        let getUserPreference = function (userid, name) {
            let request = {
                methodname: 'core_user_get_user_preferences',
                args: {
                    userid: userid,
                    name: name,
                },
            }
            Ajax.call([request])[0].then(function (data) {
                console.log(data);
            })
                .fail(notification.exception);
        }

        let setUserPreference = function (name, value, userid) {
            let request = {
                methodname: 'core_user_set_user_preferences',
                args: {
                    preferences: [
                        {
                            name: name,
                            value: value,
                            userid: userid
                        }
                    ]
                }
            }
            Ajax.call([request])[0].then(function (data) {
                console.log(data);
            })
                .fail(notification.exception);
        }

        let registerEventListeners = function (role) {
            $(ItemSelectors.containers.calendar).change(function (e) {
                let setValMinAndMaxDate = [
                    $(ItemSelectors.calendar.inputStart).val(),
                    $(ItemSelectors.calendar.inputEnd).val()
                ];
                loadTimetable(role, $(ItemSelectors.containers.pageContent), $(ItemSelectors.containers.mainContent), setValMinAndMaxDate);
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