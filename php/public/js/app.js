$(function () {
    let mainDiv = $('#myCalendar');
    let divDay = $('<div class="current-date"></div>'),
        dayDiv = $('<div class="current-day"></div>'),
        monthDiv = $('<div class="current-month"></div>'),
        monthes = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
    let date = new Date();
    dayDiv.text(date.getDate());
    monthDiv.text(monthes[date.getMonth()]);
    divDay
        .append(dayDiv)
        .append(monthDiv);
    mainDiv.append(divDay);
    $.ajax({
        url: '/calendar/get_event',
        method: 'POST',
        data: {date: date.getDate() + '.' + (date.getMonth() + 1) + '.' + date.getFullYear()},
        dataType: 'json',
        success: function (response) {
            let eventMain = $('<div class="current-event"></div>'),
                eventTitle = $('<div class="current-event-title"></div>'),
                eventImg = $('<div class="current-event-img"></div>'),
                eventDesc = $('<div class="current-event-desc"></div>');

            eventImg.append($('<img src="'+response.img_url+'">'));
            eventTitle.text(response.header);
            eventDesc.text(response.desc);
            eventMain
                .append(eventTitle)
                .append(eventImg)
                .append(eventDesc);
            mainDiv.append(eventMain);
        },
        error: function (response) {
        }
    });


})