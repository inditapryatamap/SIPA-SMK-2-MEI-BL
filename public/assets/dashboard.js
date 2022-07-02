var profitShare = function() {        
    if (!KTUtil.getByID('kt_chart_profit_share')) {
        return;
    }

    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    35, 30, 35
                ],
                backgroundColor: [
                    '#0E961C',
                    '#FF8A00',
                    '#FF0000'
                ]
            }],
            labels: [
                'Tinggi',
                'Sama',
                'Rendah'
            ]
        },
        options: {
            cutoutPercentage: 75,
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false,
                position: 'top',
            },
            title: {
                display: false,
                text: 'Technology'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'nearest',
                bodySpacing: 5,
                yPadding: 10,
                xPadding: 10, 
                caretPadding: 0,
                displayColors: false,
                backgroundColor: ['#0E961C','#FF8A00','#FF0000'],
                titleFontColor: '#ffffff', 
                cornerRadius: 4,
                footerSpacing: 0,
                titleSpacing: 0
            }
        }
    };

    var ctx = KTUtil.getByID('kt_chart_profit_share').getContext('2d');
    console.log('hai');
    new Chart(ctx, config);
}

profitShare()

var keseluruhanChart = function() {

    console.log('getValueKeseluruhan() :>> ', getValueKeseluruhan());

    if (!KTUtil.getByID('kt_chart_keseluruhan')) {
        return;
    }

    var config = {
        type: 'line',
        data: {
            datasets: [{
                label: 'Pelaksanaan Magang',
                data: getValueKeseluruhan('magang'),
                fill: false,
                borderColor: '#0E961C',
                backgroundColor: '#000',
                tension: 0.1
            }, {
                label: 'Pelaksanaan PKL',
                data: getValueKeseluruhan('pkl'),
                fill: false,
                borderColor: '#FF8A00',
                backgroundColor: '#000',
                tension: 0.1
            }],
            labels: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agu',
                'Sep',
                'Okt',
                'Nov',
                'Des',
            ]
        },
        options: {
            cutoutPercentage: 75,
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false,
                position: 'top',
            },
            title: {
                display: false,
                text: 'Technology'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'nearest',
                bodySpacing: 5,
                yPadding: 10,
                xPadding: 10, 
                caretPadding: 0,
                displayColors: false,
                backgroundColor: ['#0E961C','#FF8A00','#FF0000'],
                titleFontColor: '#ffffff', 
                cornerRadius: 4,
                footerSpacing: 0,
                titleSpacing: 0
            }
        }
    };

    var ctx = KTUtil.getByID('kt_chart_keseluruhan').getContext('2d');
    new Chart(ctx, config);
}

profitShare()
keseluruhanChart()

function getValueKeseluruhan(type) {
    let fixed = [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'Mei',
        'Jun',
        'Jul',
        'Agu',
        'Sep',
        'Okt',
        'Nov',
        'Des',
    ]
    let fixedValue = []
    if (type === 'pkl') {
        for (let k = 0; k < fixed.length; k++) {
            for (var key in keseluruhan['pkl']) {
                fixedValue[k] = 0
                if (key == fixed[k]) {
                    fixedValue[k] = keseluruhan['pkl'][key].length
                    break
                }
            }
        }
    } else {
        for (let k = 0; k < fixed.length; k++) {
            for (var key in keseluruhan['magang']) {
                fixedValue[k] = 0
                if (key == fixed[k]) {
                    fixedValue[k] = keseluruhan['magang'][key].length
                    break
                }
            }
        }
    }
    
    
    return fixedValue;
}

// tinymce.init({
//     selector: 'textarea#default-editor'
// });

$('textarea#tiny').tinymce({ height: 500, /* other settings... */ });