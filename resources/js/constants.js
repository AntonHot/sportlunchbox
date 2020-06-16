export default Object.freeze({
    editMode: {
        ADD: 'add',
        UPDATE: 'update',
    },

    actions: {
        ADD: 'add',
        UPDATE: 'update',
        DELETE: 'delete',
    },

    WEEKDAYS: {
        0: 'Воскресенье',
        1: 'Понедельник',
        2: 'Вторник',
        3: 'Среда',
        4: 'Четверг',
        5: 'Пятница',
        6: 'Суббота',
    },

    WEEKDAYS_INDEX: {
        'monday': 0,
        'tuesday': 1,
        'wednesday': 2,
        'thursday': 3,
        'friday': 4,
        'saturday': 5,
        'sunday': 6,
    },
    
    DATE_FORMAT: 'YYYY-MM-DD',
    
    formatDate(str) {
        const monthDigits = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        let dateParsed = Date.parse(str);
        let date;
        if (isNaN(dateParsed)) {
            date = new Date();
        } else {
            date = new Date(dateParsed);
        }
        let day = date.getDate();
        let month = monthDigits[date.getMonth()];
        let year = date.getFullYear();
        return `${day}.${month}.${year}`;
    },

    weekdayByDate(str) {
        let dateParsed = Date.parse(str);
        let date;
        if (!isNaN(dateParsed)) {
            date = new Date(dateParsed);
        } else {
            return '';
        }
        return this.WEEKDAYS[date.getDay()];
    },
})