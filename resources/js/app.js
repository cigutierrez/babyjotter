/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

// Custom JS
document.body.onload = function () {
    // Get the calculate Start Time Button
    let calcStartTimeBtn = document.querySelector("#caclStartTime");
    // Get the calculate End Time Button
    let calcEndTimeBtn = document.querySelector("#calcEndTime");

    // Get the start Time input
    let startTimeInput = document.querySelector("#startTime");
    // Get the end Time input
    let endTimeInput = document.querySelector("#endTime");
    // Get the total Time input
    let totalTime = document.querySelector("#totalTime");

    // For time calculations
    let sTime;
    let eTime;

    // Only perform these if it exists on the body -- Basically if we are at the naps creation screen.
    if (calcStartTimeBtn != null) {
        calcStartTimeBtn.addEventListener('click', function (e) {
            // Prevent the Form from submitting
            e.preventDefault();

            // Create time variable
            sTime = new Date();

            // Formatting for Minutes
            if (sTime.getMinutes() < 10) {
                let timeString = sTime.getHours() + ":0" + sTime.getMinutes();
                startTimeInput.value = timeString;
            } else {
                startTimeInput.value = sTime.getHours() + ":" + sTime.getMinutes();
            }

        });

        calcEndTimeBtn.addEventListener('click', function (e) {
            // Prevent the Form from submitting
            e.preventDefault();

            // Create time variable
            eTime = new Date();

            // Formatting for Minutes
            if (eTime.getMinutes() < 10) {
                let timeString = eTime.getHours() + ":0" + eTime.getMinutes();
                endTimeInput.value = timeString;
            } else {
                endTimeInput.value = eTime.getHours() + ":" + eTime.getMinutes();
            }
        });

        totalTime.addEventListener("focus", function (e) {
            // Check to see if startTimeInput and endTimeInput have values greater than 0
            if (startTimeInput.value.length > 0 && endTimeInput.value.length > 0) {
                let eHour = endTimeInput.value.slice(0, 2);
                let eMinute = endTimeInput.value.slice(3, 5);

                let sHour = startTimeInput.value.slice(0, 2);
                let sMinute = startTimeInput.value.slice(3, 5);

                let totalH;
                let totalM;

                // Perform the correct mathematical funciton
                if (eHour > sHour && eMinute < sMinute) {
                    // In order to get the correct amount of minutes if the minutes in the endTime are less than the minutes in the startTime, we have to peform the following operation: (60 minutes - sMinute - eMinute) / 60 to get the correct hours
                    totalM = ((60 - (sMinute - eMinute)) / 60)

                    // In order to get the correct hours, we have to carry a 1
                    totalH = eHour - sHour - 1;

                    // Set the value
                    totalTime.value = (totalH + totalM).toFixed(2);

                } else if (eHour > sHour && eMinute > sMinute) {
                    // In order to get the correct amount of minutes if the minutes in the endTime are less than the minutes in the startTime, we have to peform the following operation: (60 minutes - sMinute - eMinute) / 60 to get the correct hours
                    totalM = ((sMinute - eMinute) / 100);

                    // In order to get the correct hours, we have to carry a 1
                    totalH = eHour - sHour;

                    // Set the value
                    totalTime.value = (totalH + totalM).toFixed(2);

                }
                 else if (eHour < sHour && eMinute < sMinute) {
                    // In order to get the correct amount of minutes if the minutes in the endTime are less than the minutes in the startTime, we have to peform the following operation: (60 minutes - sMinute - eMinute) / 60 to get the correct hours
                    totalM = (sMinute - eMinute) / 60;

                    // In order to get the correct hours, we have to carry a 1
                    totalH = (parseInt(eHour) + 24) - sHour;

                    // Set the value
                    totalTime.value = (totalH + totalM).toFixed(2);
                } else if (eHour < sHour && eMinute > sMinute) {
                    // In order to get the correct amount of minutes if the minutes in the endTime are less than the minutes in the startTime, we have to peform the following operation: (60 minutes - sMinute - eMinute) / 60 to get the correct hours
                    totalM = ((60 - (sMinute - eMinute)) / 60)

                    // In order to get the correct hours, we have to carry a 1
                    totalH = (parseInt(eHour) + 24) - sHour;

                    // Set the value
                    totalTime.value = (totalH + totalM).toFixed(2);
                }
                 else {
                    // Else just perform basic math
                    totalM = (eMinute - sMinute) / 60;
                    totalH = eHour - sHour;

                    // Make it to 2 places.
                    totalTime.value = (totalH + totalM).toFixed(2);
                }
            }
        })
    }
}