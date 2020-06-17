define([], function () {
    return {
        calendar: {
            wrapperAndInputs: ".calendar_table > input",
            inputStart: ".input-start",
            inputEnd: ".input-end"
        },
        containers: {
            loadingIcon: '[data-region="overlay-icon-container"]',
            calendar: ".calendar_table",
            timetable: ".main_container_studtimetable",
            pageContent: "#region-main-box",
            mainContent: "[role='main']"
        }
    };
});