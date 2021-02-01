 function Animation(id, fps, urls) {
    this.imageId = id; // id элемента Img
    this.fps = 1000 / fps; // скорость смены кадров
    this.imgElement = null; //элемент Img в котором будет воспроизводиться анимация
    this.frames = new Array(urls.length); //массив с загружиными изображениями

    this.loadedFrames = 0; //количество загруженых изображений
    this.isLoaded = false; //true - если все изображения загружены
    this.currentFrame = -1; //текущее изображение которое должно и\готбражаться из массива frames
    this.timer = null; // объект таймера, который будет создан через setInterval
    this.startOnload = false; // true если анимация должна запускаться после загрузки всех изображений

    //загрузка изображений
    for(let i = 0; i < urls.length; i++){
        this.frames[i] = new Image();
        this.frames[i].onload = countLoaded;
        this.frames[i].src = urls[i];
    }

    let current = this;

    function countLoaded(){
        current.loadedFrames++;
        if(current.loadedFrames == urls.length) {
            current.isLoaded = true; // все изображения загружены
            if(current.startOnload) { // запуск анимации если в startOnload true
                current.start();
            } 
        }
    }

    // нижнее подчеркивание в имени метода указавет на то что он преднозначен только для внутренего использования
    this._nextFrame = function(){
        // при запуске метода через setInterval this будет ссылаться на window
        current.currentFrame = (current.currentFrame + 1) % current.frames.length;
        current.imgElement.src = current.frames[current.currentFrame].src;
    }
}

//метод для запуска анимации
Animation.prototype.start = function() {
    if(this.timer) return;

    if(!this.isLoaded) {
        this.startOnload = true;
    } else {
        if(!this.imgElement){
            this.imgElement = document.getElementById(this.imageId);
        } else {
            this._nextFrame();
            this.timer = setInterval(this._nextFrame, this.fps);
        }
    }
}

// метод для остоновки анимации
Animation.prototype.stop = function() {
    if(this.timer) clearInterval(this.timer);
    this.timer = null;
}


