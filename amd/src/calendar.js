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
    ], function(
        $,
        Ajax,
        ItemSelectors,
        Notification
    ){

        let addLoaderToPage = function (root){
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
            console.log(loadingIconContainer);
            loadingIconContainer.removeClass('hidden');
        };

        let stopLoading = function (root) {
            let loadingIconContainer = root.find(ItemSelectors.containers.loadingIcon);
            loadingIconContainer.addClass('hidden');
        };

        let loadTimetable = function(role, root = $(ItemSelectors.containers.mainContent)) {

            $.ajax({
                type: "POST",
                data: {role:role},
                url: "ajax.php",
                async: false,
                beforeSend: function(){
                    startLoading(root);
                },
                complete:function(){
                    stopLoading(root);
                },
                success: function (data) {
                    root.append(data);
                },
                dataType: "html",
                cache: "false",
                error: Notification.exception
            });
        }

        let registerEventListeners = function() {
            $(ItemSelectors.containers.calendar).change(function (e) {
                let item = e.target;
                loadTimetable(ItemSelectors.containers.timetable, item.value);
            });
        }

        return{
            init: function(role){

                addLoaderToPage(ItemSelectors.containers.pageContent);
                loadTimetable(role);
            }
        }
    }
);