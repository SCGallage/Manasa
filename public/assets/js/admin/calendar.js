isLeapYear = (year) => {
    return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 ===0)
}

getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28;
}

const month_name = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const month_picker = document.getElementById('month-picker');

generateCalendar = (year, month) => {

    let calendar_days = document.querySelector('.calendar-days');
    let calendar_header_year = document.querySelector('#year');

    let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    calendar_days.innerHTML = '';

    let curr_date = new Date();

    if (!month) month = curr_date.getMonth();
    if (!year) year = curr_date.getFullYear();

    let curr_month = `${month_name[month]}`;
    month_picker.value = month;
    calendar_header_year.innerHTML = year;

    let first_day = new Date(year, month, 1);

    for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {

        let day = document.createElement('div');
        if (i >= first_day.getDay()) {
            day.classList.add('calendar-day-hover');
            day.innerHTML = i - first_day.getDay() + 1;

            if (i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() && month === currDate.getMonth()) {
                console.log('Reached as Well!');
                day.classList.add('curr-date');
            }
        }
        console.log('Reached');
        calendar_days.appendChild(day);
    }
    console.log(month);

}

currDate = new Date();

let curr_month = {value: currDate.getMonth()};
let curr_year = {value: currDate.getFullYear()};

generateCalendar(curr_year.value, curr_month.value);

document.querySelector('#next-year').addEventListener('click', () => {
    ++curr_year.value;
    generateCalendar(curr_year.value, curr_month.value);
});

document.querySelector('#prev-year').addEventListener('click', () => {
    --curr_year.value;
    generateCalendar(curr_year.value, curr_month.value);
});

month_picker.addEventListener('change', () => {
    curr_month.value = month_picker.value;
    generateCalendar(curr_year.value, curr_month.value);
});

setDateAndTime = (year, month, day) => {

    const titleDate = document.getElementById('date-title');
    titleDate.innerHTML = `${day} ${month_name[month]} ${year}`;

};

setDateAndTime(currDate.getFullYear(), currDate.getMonth(), currDate.getDate());