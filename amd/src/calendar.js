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
            $(root).
            append("<span></span>").addClass("overlay-icon-container hidden").attr("data-region","overlay-icon-container").
            append("<span></span>").addClass("loading-icon icon-no-margin").
            append("<i></i>").addClass("icon fa fa-circle-o-notch fa-spin fa-fw").attr("title", "Загрузка").attr("aria-label", "Загрузка");
        }

        let startLoading = function (root) {
            let loadingIconContainer = root.find(ItemSelectors.containers.loadingIcon);
            loadingIconContainer.removeClass('hidden');
        };

        let stopLoading = function (root) {
            let loadingIconContainer = root.find(ItemSelectors.containers.loadingIcon);
            loadingIconContainer.addClass('hidden');
        };

        let refreshTimetable = function(body, date) {
            startLoading(body);

            return updateContent(date)
                .then(function() {
                    console.log('Success!');
                })
                .always(function() {
                    return stopLoading(body);
                })
                .fail(Notification.exception);
        };

        let updateContent = function() {
            let request = {
                methodname: 'local_timetable_classes_timetable_gettable'
            };
            return Ajax.call([request])[0];
        };

        let registerEventListeners = function() {
            $(ItemSelectors.containers.calendar).change(function (e) {
                let item = e.target;
                console.log(item);
                refreshTimetable(ItemSelectors.timetable, item.value);
            });

        }

        return{
            init:function () {
                addLoaderToPage("#page-content");
                startLoading(ItemSelectors.containers.timetable);
                $(window).ready(function() {
                    registerEventListeners();
                });
            }
        }
    }
);