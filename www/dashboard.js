// slide
const rangerDoms = document.querySelectorAll(".ranger");
rangerDoms.forEach((rangerDom) => {
  const max = parseInt(rangerDom.getAttribute("max") || 100);
  const min = parseInt(rangerDom.getAttribute("min") || 0);

  const lineDom = rangerDom.querySelector(".line");
  const lineFillDom = rangerDom.querySelector(".line-fill");
  const ballDom = rangerDom.querySelector(".ball");
  const labelDom = rangerDom.querySelector(".label");

  //鼠标按下
  let isMousedown = false;
  rangerDom.addEventListener("mousedown", function () {
    isMousedown = true;
    rangerDom.classList.add("mousedown");
  });
  document.addEventListener("mouseup", function () {
    isMousedown = false;
    rangerDom.classList.remove("mousedown");

    //松开鼠标时吸附
    refresh();
  });

  //这个是在调整窗口大小时自动更新状态
  window.addEventListener("resize", refresh());

  function refresh() {
    const value = rangerDom.value;
    render(value * getUnitSize(), value);
  }

  //update
  document.addEventListener("mousemove", update);
  document.addEventListener("mousedown", update);
  function update(e) {
    if (isMousedown) {
      const left = getLeft(e.pageX);
      const value = getValue(left);

      render(left, value);
    }
  }
  function render(left, value) {
    ballDom.style.left = `${left}px`;
    lineFillDom.style.width = `${left}px`;

    rangerDom.value = value;
    labelDom.innerHTML = value;
  }
  function getLeft(pageX) {
    const { left, width } = lineDom.getBoundingClientRect();
    const l = pageX - left;
    if (l < 0) {
      return 0;
    }
    if (l > width) {
      return width;
    }
    return l;
  }
  function getValue(left) {
    const unitSize = getUnitSize();
    return Math.floor((left + unitSize / 2) / unitSize);
  }
  function getUnitSize() {
    const { width } = lineDom.getBoundingClientRect();
    return width / (max - min);
  }
});


//  control
const slider = document.getElementById("brightness-slider");
slider.addEventListener("input", function(){
    document.documentElement.style.setProperty("--brightness", this.value/100)
});

// air conditional
const decreaseTemperatureButton = document.getElementById("decrease-temperature-button");
const increaseTemperatureButton = document.getElementById("increase-temperature-button");
const temperatureDisplay = document.getElementById("temperature-display");
const powerOnButton = document.getElementById("power-on-button");
const powerOffButton = document.getElementById("power-off-button");

let temperature = 20;

decreaseTemperatureButton.addEventListener("click", function(){
    temperature--;
    temperatureDisplay.innerHTML = temperature;
});

increaseTemperatureButton.addEventListener("click", function(){
    temperature++;
    temperatureDisplay.innerHTML = temperature;
});

powerOnButton.addEventListener("click", function(){
    powerOnButton.style.backgroundColor = "green";
    powerOnButton.style.color = "white";
    powerOffButton.style.backgroundColor = "white";
    powerOffButton.style.color = "black";
});

powerOffButton.addEventListener("click", function(){
    powerOffButton.style.backgroundColor = "red";
    powerOffButton.style.color = "white";
    powerOnButton.style.backgroundColor = "white";
    powerOnButton.style.color = "black";
});
// speaker
const powerOnButtonSpeaker = document.getElementById("power-on-button");
const powerOffButtonSpeaker = document.getElementById("power-off-button");
const decreaseVolumeButton = document.getElementById("decrease-volume-button");
const increaseVolumeButton = document.getElementById("increase-volume-button");
const volumeDisplay = document.getElementById("volume-display");

let volume = 50;

powerOnButtonSpeaker.addEventListener("click", function(){
    powerOnButtonSpeaker.style.backgroundColor = "green";
    powerOnButtonSpeaker.style.color = "white";
    powerOffButtonSpeaker.style.backgroundColor = "white";
    powerOffButtonSpeaker.style.color = "black";
});

powerOffButtonSpeaker.addEventListener("click", function(){
    powerOffButtonSpeaker.style.backgroundColor = "red";
    powerOffButtonSpeaker.style.color = "white";
    powerOnButtonSpeaker.style.backgroundColor = "white";
    powerOnButtonSpeaker.style.color = "black";
});

decreaseVolumeButton.addEventListener("click", function(){
    volume--;
    volumeDisplay.innerHTML = volume;
});

increaseVolumeButton.addEventListener("click", function(){
    volume++;
    volumeDisplay.innerHTML = volume;
});

const powerOnButtonTv = document.getElementById("power-on-button");
const powerOffButtonTv = document.getElementById("power-off-button");
// popup
const popupTrigger = document.getElementById("popup-trigger");
const popup = document.getElementById("popup");
const popupCloseButton = document.getElementById("popup-close-button");

popupTrigger.addEventListener("click", function() {
    popup.style.display = "block";
});

popupCloseButton.addEventListener("click", function() {
    popup.style.display = "none";
});
// light
$("#slider1").roundSlider({
    radius: 100,
    circleShape: "half-top",
    sliderType: "min-range",
    showTooltip: true,
    value: 50,
    tooltipFormat: "changeTooltip"
});

function changeTooltip(e) {
    var val = e.value;
    return val + "%";
};




let btn=document.querySelector('.btn-alert1')
        //获得弹窗
        let alertEl=document.querySelector('.alert')
        btn.onclick=function(){
            alertEl.style.display='flex'
        }
        //获得关闭按钮
        let btnClose=document.querySelector('.close')
        btnClose.onclick=function(){
            alertEl.style.display='none'
        }
        alertEl.onclick=function(e){
            console.log(e)
            if(e.target==alertEl){
                alertEl.style.display='none'
            }
           
        }