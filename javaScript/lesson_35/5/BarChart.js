function createBarChart(canvas, data, width, height, color) {
    if(typeof canvas == 'string'){
        canvas = document.getElementById(canvas);
    }

    canvas.width = width;
    canvas.height = height;


    let context = canvas.getContext("2d");

    let max = Number.NEGATIVE_INFINITY;
    for (let i = 0; i < data.length; i++){
        if (max < data[i]) max = data[i];
    }

    let scale = height / max;

    let barWidth = Math.floor(width / data.length);

    for(let i = 0; i < data.length; i++) {
        let barHeight = data[i] * scale;

        let x = barWidth * i;
        let y = height - barHeight;

        context.fillStyle = color;
        context.fillRect( x, y, barWidth - 5, barHeight);
    }
}