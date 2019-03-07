/*
 * Swipe 2.0
 *
 * Brad Birdsall
 * Copyright 2013, MIT License
 *
*/

function Swipe(container, options) {

  "use strict";

  // utilities
  var noop = function() {}; // 简卿����ߠ操作功�?
  var offloadFn = function(fn) { setTimeout(fn || noop, 0) }; // 卸载�ɟ能�Є执�?
  
  // 检�ҥ浏������Є功�?
  var browser = {
    addEventListener: !!window.addEventListener,
    touch: ('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch,
    transitions: (function(temp) {
      var props = ['transformProperty', 'WebkitTransform', 'MozTransform', 'OTransform', 'msTransform'];
      for ( var i in props ) if (temp.style[ props[i] ] !== undefined) return true;
      return false;
    })(document.createElement('swipe'))
  };

  // 如果没有�ݹ元素退�?
  if (!container) return;
  var element = container.children[0];
  var slides, slidePos, width;
  options = options || {};
  var index = parseInt(options.startSlide, 10) || 0;
  var speed = options.speed || 300;
  options.continuous = options.continuous ? options.continuous : true;

  function setup() {

    // ��쭘�Є幻灯片
    slides = element.children;

    //创建一个数组来��남每个幻灯片的��쉍�᫽�
    slidePos = new Array(slides.length);

    // 确定每个幻灯片的宽度
    width = container.getBoundingClientRect().width || container.offsetWidth;

    element.style.width = (slides.length * width) + 'px';

    // �������?
    var pos = slides.length;
    while(pos--) {

      var slide = slides[pos];

      slide.style.width = width + 'px';
      slide.setAttribute('data-index', pos);

      if (browser.transitions) {
        slide.style.left = (pos * -width) + 'px';
        move(pos, index > pos ? -width : (index < pos ? width : 0), 0);
      }

    }

    if (!browser.transitions) element.style.left = (index * -width) + 'px';

    container.style.visibility = 'visible';

  }

  function prev() {

    if (index) slide(index-1);
    else if (options.continuous) slide(slides.length-1);

  }

  function next() {

    if (index < slides.length - 1) slide(index+1);
    else if (options.continuous) slide(0);

  }

  function slide(to, slideSpeed) {

    // 如果已经滑不要求
    if (index == to) return;
    
    if (browser.transitions) {

      var diff = Math.abs(index-to) - 1;
      var direction = Math.abs(index-to) / (index-to); // 1:right -1:left

      while (diff--) move((to > index ? to : index) - diff - 1, width * direction, 0);

      move(index, width * direction, slideSpeed || speed);
      move(to, 0, slideSpeed || speed);

    } else {

      animate(index * -width, to * -width, slideSpeed || speed);

    }

    index = to;

    offloadFn(options.callback && options.callback(index, slides[index]));

  }

  function move(index, dist, speed) {

    translate(index, dist, speed);
    slidePos[index] = dist;

  }

  function translate(index, dist, speed) {

    var slide = slides[index];
    var style = slide && slide.style;

    if (!style) return;

    style.webkitTransitionDuration = 
    style.MozTransitionDuration = 
    style.msTransitionDuration = 
    style.OTransitionDuration = 
    style.transitionDuration = speed + 'ms';

    style.webkitTransform = 'translate(' + dist + 'px,0)' + 'translateZ(0)';
    style.msTransform = 
    style.MozTransform = 
    style.OTransform = 'translateX(' + dist + 'px)';

  }

  function animate(from, to, speed) {

    // 如果不是�ɨ画，只是��新定�?
    if (!speed) {
      
      element.style.left = to + 'px';
      return;

    }
    
    var start = +new Date;
    
    var timer = setInterval(function() {

      var timeElap = +new Date - start;
      
      if (timeElap > speed) {

        element.style.left = to + 'px';

        if (delay) begin();

        options.transitionEnd && options.transitionEnd.call(event, index, slides[index]);

        clearInterval(timer);
        return;

      }

      element.style.left = (( (to - from) * (Math.floor((timeElap / speed) * 100) / 100) ) + from) + 'px';

    }, 4);

  }

  // 安装��ɺ����动幻灯�?
  var delay = options.auto || 0;
  var interval;

  function begin() {

    interval = setTimeout(next, delay);

  }

  function stop() {

    delay = 0;
    clearTimeout(interval);

  }


  // 设置初始变量
  var start = {};
  var delta = {};
  var isScrolling;      

  // 设置事件捕获
  var events = {

    handleEvent: function(event) {

      switch (event.type) {
        case 'touchstart': this.start(event); break;
        case 'touchmove': this.move(event); break;
        case 'touchend': offloadFn(this.end(event)); break;
        case 'webkitTransitionEnd':
        case 'msTransitionEnd':
        case 'oTransitionEnd':
        case 'otransitionend':
        case 'transitionend': offloadFn(this.transitionEnd(event)); break;
        case 'resize': offloadFn(setup.call()); break;
      }

      if (options.stopPropagation) event.stopPropagation();

    },
    start: function(event) {

      var touches = event.touches[0];

      // 测量�Є起��ɀ?
      start = {

        // 得到初始�Є触摸坐��?
        x: touches.pageX,
        y: touches.pageY,

        // ��남�߶间确定接触�߶间
        time: +new Date

      };
      
      // 用于测试�Є第一移动事件
      isScrolling = undefined;

      // �ո��三角洲和���后计算�?
      delta = {};

      // 设置touchmove和touchend监听
      element.addEventListener('touchmove', this, false);
      element.addEventListener('touchend', this, false);

    },
    move: function(event) {

      // 确���一个触摸不捏刷
      if ( event.touches.length > 1 || event.scale && event.scale !== 1) return

      if (options.disableScroll) event.preventDefault();

      var touches = event.touches[0];

      // 计算改变后的 x �?y
      delta = {
        x: touches.pageX - start.x,
        y: touches.pageY - start.y
      }

      // 确定测试运行�ؔ—一个滚�ɨ时间测�?
      if ( typeof isScrolling == 'undefined') {
        isScrolling = !!( isScrolling || Math.abs(delta.x) < Math.abs(delta.y) );
      }

      // 如果用户没有试图垂直�벊�
      if (!isScrolling) {

        // �ֲ止���机�벊�
        event.preventDefault();

        // ���׭�幻灯片显�?
        stop();

        // 如果第一个或���后一个滑�ɨ阻�ɛ增��?
        delta.x = 
          delta.x / 
            ( (!index && delta.x > 0               // if first slide and sliding left
              || index == slides.length - 1        // or if last slide and sliding right
              && delta.x < 0                       // and if sliding at all
            ) ?                      
            ( Math.abs(delta.x) / width + 1 )      // determine resistance level
            : 1 );                                 // no resistance if false
        
        // 转化 1:1
        translate(index-1, delta.x + slidePos[index-1], 0);
        translate(index, delta.x + slidePos[index], 0);
        translate(index+1, delta.x + slidePos[index+1], 0);

      }

    },
    end: function(event) {

      // 计算持续�߶间
      var duration = +new Date - start.time;

      // 确定滑动尝试触发下一�?�¦��页滑��?
      var isValidSlide = 
            Number(duration) < 250               // if slide duration is less than 250ms
            && Math.abs(delta.x) > 20            // and if slide amt is greater than 20px
            || Math.abs(delta.x) > width/2;      // or if slide amt is greater than half the width

      // 如果尝试确定滑��ա�的开��ɒ�结束
      var isPastBounds = 
            !index && delta.x > 0                            // 如果第一个幻灯片和幻灯片AMT大于0
            || index == slides.length - 1 && delta.x < 0;    // 或者如枲ל�后一张幻灯片,幻灯片amt小于0
      
      // 确定滑动方向(true:right, false:left)
      var direction = delta.x < 0;

      // 如果不垂直滚��?
      if (!isScrolling) {

        if (isValidSlide && !isPastBounds) {

          if (direction) {

            move(index-1, -width, 0);
            move(index, slidePos[index]-width, speed);
            move(index+1, slidePos[index+1]-width, speed);
            index += 1;

          } else {

            move(index+1, width, 0);
            move(index, slidePos[index]+width, speed);
            move(index-1, slidePos[index-1]+width, speed);
            index += -1;

          }

          options.callback && options.callback(index, slides[index]);

        } else {

          move(index-1, -width, speed);
          move(index, 0, speed);
          move(index+1, width, speed);

        }

      }

      // 取消touchmove和touchend事件监听�?直到touchstart再次��ݔ�
      element.removeEventListener('touchmove', events, false)
      element.removeEventListener('touchend', events, false)

    },
    transitionEnd: function(event) {

      if (parseInt(event.target.getAttribute('data-index'), 10) == index) {
        
        if (delay) begin();

        options.transitionEnd && options.transitionEnd.call(event, index, slides[index]);

      }

    }

  }

  // 触发设置 
  setup();

  // 如果�͂用�顼�始自�ɨ幻灯片
  if (delay) begin();


  // 添加事件监听�?
  if (browser.addEventListener) {
    
    // 设置touchstart事件��ݴ�    
    if (browser.touch) element.addEventListener('touchstart', events, false);

    if (browser.transitions) {
      element.addEventListener('webkitTransitionEnd', events, false);
      element.addEventListener('msTransitionEnd', events, false);
      element.addEventListener('oTransitionEnd', events, false);
      element.addEventListener('otransitionend', events, false);
      element.addEventListener('transitionend', events, false);
    }

    //设置在窗口调整大小事�?
    window.addEventListener('resize', events, false);

  } else {

    window.onresize = function () { setup() }; // to play nice with old IE

  }

  // 公开Swipe API
  return {
    setup: function() {

      setup();

    },
    slide: function(to, speed) {

      slide(to, speed);

    },
    prev: function() {

      // cancel slideshow
      stop();

      prev();

    },
    next: function() {

      stop();

      next();

    },
    getPos: function() {

      // return current index position
      return index;

    },
    kill: function() {

      // 取消幻灯�?
      stop();

      // reset element
      element.style.width = 'auto';
      element.style.left = 0;

      // reset slides
      var pos = slides.length;
      while(pos--) {

        var slide = slides[pos];
        slide.style.width = '100%';
        slide.style.left = 0;

        if (browser.transitions) translate(pos, 0, 0);

      }

      // 删除事件侦听�?
      if (browser.addEventListener) {

        // remove current event listeners
        element.removeEventListener('touchstart', events, false);
        element.removeEventListener('webkitTransitionEnd', events, false);
        element.removeEventListener('msTransitionEnd', events, false);
        element.removeEventListener('oTransitionEnd', events, false);
        element.removeEventListener('otransitionend', events, false);
        element.removeEventListener('transitionend', events, false);
        window.removeEventListener('resize', events, false);

      }
      else {

        window.onresize = null;

      }

    }
  }

}


if ( window.jQuery || window.Zepto ) {
  (function($) {
    $.fn.Swipe = function(params) {
      return this.each(function() {
        $(this).data('Swipe', new Swipe($(this)[0], params));
      });
    }
  })( window.jQuery || window.Zepto )
}
