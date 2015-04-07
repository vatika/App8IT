(function($){var methods={init:function(options){var defaults={set_width:false,set_height:false,horizontalScroll:false,scrollInertia:550,scrollEasing:"easeOutCirc",mouseWheel:"auto",autoDraggerLength:true,scrollButtons:{enable:false,scrollType:"continuous",scrollSpeed:20,scrollAmount:40},advanced:{updateOnBrowserResize:true,updateOnContentResize:false,autoExpandHorizontalScroll:false},callbacks:{onScroll:function(){},onTotalScroll:function(){},onTotalScrollOffset:0}},options=$.extend(true,defaults,options);$(document).data("mCS-is-touch-device",false);if(is_touch_device()){$(document).data("mCS-is-touch-device",true);}
function is_touch_device(){return!!("ontouchstart"in window)?1:0;}
return this.each(function(){var $this=$(this);if(options.set_width){$this.css("width",options.set_width);}
if(options.set_height){$this.css("height",options.set_height);}
if(!$(document).data("mCustomScrollbar-index")){$(document).data("mCustomScrollbar-index","1");}else{var mCustomScrollbarIndex=parseInt($(document).data("mCustomScrollbar-index"));$(document).data("mCustomScrollbar-index",mCustomScrollbarIndex+1);}
$this.wrapInner("<div class='mCustomScrollBox' id='mCSB_"+$(document).data("mCustomScrollbar-index")+"' style='position:relative; height:100%; overflow:hidden; max-width:100%;' />").addClass("mCustomScrollbar _mCS_"+$(document).data("mCustomScrollbar-index"));$('li .sj-item-wrapper').bind("click",function(){var mCSB_clickAcTimeout;if(mCSB_clickAcTimeout){clearTimeout(mCSB_clickAcTimeout);}
mCSB_clickAcTimeout=setTimeout(function(){$this.mCustomScrollbar("update");},300);});var mCustomScrollBox=$this.children(".mCustomScrollBox");if(options.horizontalScroll){mCustomScrollBox.addClass("mCSB_horizontal").wrapInner("<div class='mCSB_h_wrapper' style='position:relative; left:0; width:999999px;' />");var mCSB_h_wrapper=mCustomScrollBox.children(".mCSB_h_wrapper");mCSB_h_wrapper.wrapInner("<div class='mCSB_container' style='position:absolute; left:0;' />").children(".mCSB_container").css({"width":mCSB_h_wrapper.children().outerWidth(),"position":"relative"}).unwrap();}else{mCustomScrollBox.wrapInner("<div class='mCSB_container' style='position:relative; top:0;' />");}
var mCSB_container=mCustomScrollBox.children(".mCSB_container");if(!$(document).data("mCS-is-touch-device")){mCSB_container.after("<div class='mCSB_scrollTools' style='position:absolute;'><div class='mCSB_draggerContainer' style='position:relative;'><div class='mCSB_dragger' style='position:absolute;'><div class='mCSB_dragger_bar' style='position:relative;'></div></div><div class='mCSB_draggerRail'></div></div></div>");var mCSB_scrollTools=mCustomScrollBox.children(".mCSB_scrollTools"),mCSB_draggerContainer=mCSB_scrollTools.children(".mCSB_draggerContainer"),mCSB_dragger=mCSB_draggerContainer.children(".mCSB_dragger");if(options.horizontalScroll){mCSB_dragger.data("minDraggerWidth",mCSB_dragger.width());}else{mCSB_dragger.data("minDraggerHeight",mCSB_dragger.height());}
if(options.scrollButtons.enable){if(options.horizontalScroll){mCSB_scrollTools.prepend("<a class='mCSB_buttonLeft' style='display:block; position:relative;'></a>").append("<a class='mCSB_buttonRight' style='display:block; position:relative;'></a>");}else{mCSB_scrollTools.prepend("<a class='mCSB_buttonUp' style='display:block; position:relative;'></a>").append("<a class='mCSB_buttonDown' style='display:block; position:relative;'></a>");}}
mCustomScrollBox.bind("scroll",function(){mCustomScrollBox.scrollTop(0).scrollLeft(0);});$this.data({"horizontalScroll":options.horizontalScroll,"scrollInertia":options.scrollInertia,"scrollEasing":options.scrollEasing,"mouseWheel":options.mouseWheel,"autoDraggerLength":options.autoDraggerLength,"scrollButtons-enable":options.scrollButtons.enable,"scrollButtons-scrollType":options.scrollButtons.scrollType,"scrollButtons-scrollSpeed":options.scrollButtons.scrollSpeed,"scrollButtons-scrollAmount":options.scrollButtons.scrollAmount,"autoExpandHorizontalScroll":options.advanced.autoExpandHorizontalScroll,"onScroll-Callback":options.callbacks.onScroll,"onTotalScroll-Callback":options.callbacks.onTotalScroll,"onTotalScroll-Offset":options.callbacks.onTotalScrollOffset}).mCustomScrollbar("update");if(options.advanced.updateOnBrowserResize){var mCSB_resizeTimeout;$(window).resize(function(){if(mCSB_resizeTimeout){clearTimeout(mCSB_resizeTimeout);}
mCSB_resizeTimeout=setTimeout(function(){$this.mCustomScrollbar("update");},150);});}}else{var ua=navigator.userAgent;if(ua.indexOf("Android")!=-1){var androidversion=parseFloat(ua.slice(ua.indexOf("Android")+8));if(androidversion<3){touchScroll("mCSB_"+$(document).data("mCustomScrollbar-index"));}else{mCustomScrollBox.css({"overflow":"auto","-webkit-overflow-scrolling":"touch"});}}else{mCustomScrollBox.css({"overflow":"auto","-webkit-overflow-scrolling":"touch"});}
mCSB_container.addClass("mCS_no_scrollbar mCS_touch");$this.data({"horizontalScroll":options.horizontalScroll,"scrollInertia":options.scrollInertia,"scrollEasing":options.scrollEasing,"autoExpandHorizontalScroll":options.advanced.autoExpandHorizontalScroll,"onScroll-Callback":options.callbacks.onScroll,"onTotalScroll-Callback":options.callbacks.onTotalScroll,"onTotalScroll-Offset":options.callbacks.onTotalScrollOffset});mCustomScrollBox.scroll(function(){$this.mCustomScrollbar("callbacks",mCustomScrollBox,mCSB_container);});function touchScroll(id){var el=document.getElementById(id),scrollStartPosY=0,scrollStartPosX=0;document.getElementById(id).addEventListener("touchstart",function(event){scrollStartPosY=this.scrollTop+event.touches[0].pageY;scrollStartPosX=this.scrollLeft+event.touches[0].pageX;},false);document.getElementById(id).addEventListener("touchmove",function(event){if((this.scrollTop<this.scrollHeight-this.offsetHeight&&this.scrollTop+event.touches[0].pageY<scrollStartPosY-5)||(this.scrollTop!=0&&this.scrollTop+event.touches[0].pageY>scrollStartPosY+5))
event.preventDefault();if((this.scrollLeft<this.scrollWidth-this.offsetWidth&&this.scrollLeft+event.touches[0].pageX<scrollStartPosX-5)||(this.scrollLeft!=0&&this.scrollLeft+event.touches[0].pageX>scrollStartPosX+5))
event.preventDefault();this.scrollTop=scrollStartPosY-event.touches[0].pageY;this.scrollLeft=scrollStartPosX-event.touches[0].pageX;},false);}}
if(options.advanced.updateOnContentResize){var mCSB_onContentResize;if(options.horizontalScroll){var mCSB_containerOldSize=mCSB_container.outerWidth();if(is_touch_device()){mCustomScrollBox.css({"-webkit-overflow-scrolling":"auto"});}}else{var mCSB_containerOldSize=mCSB_container.outerHeight();}
mCSB_onContentResize=setInterval(function(){if(options.horizontalScroll){if(options.advanced.autoExpandHorizontalScroll){mCSB_container.css({"position":"absolute","width":"auto"}).wrap("<div class='mCSB_h_wrapper' style='position:relative; left:0; width:999999px;' />").css({"width":mCSB_container.outerWidth(),"position":"relative"}).unwrap();}
var mCSB_containerNewSize=mCSB_container.outerWidth();}else{var mCSB_containerNewSize=mCSB_container.outerHeight();}
if(mCSB_containerNewSize!=mCSB_containerOldSize){$this.mCustomScrollbar("update");mCSB_containerOldSize=mCSB_containerNewSize;}},300);}});},update:function(){var $this=$(this),mCustomScrollBox=$this.children(".mCustomScrollBox"),mCSB_container=mCustomScrollBox.children(".mCSB_container");if(!$(document).data("mCS-is-touch-device")){mCSB_container.removeClass("mCS_no_scrollbar");}
var mCSB_scrollTools=mCustomScrollBox.children(".mCSB_scrollTools"),mCSB_draggerContainer=mCSB_scrollTools.children(".mCSB_draggerContainer"),mCSB_dragger=mCSB_draggerContainer.children(".mCSB_dragger");if($this.data("horizontalScroll")){var mCSB_buttonLeft=mCSB_scrollTools.children(".mCSB_buttonLeft"),mCSB_buttonRight=mCSB_scrollTools.children(".mCSB_buttonRight"),mCustomScrollBoxW=mCustomScrollBox.width();if($this.data("autoExpandHorizontalScroll")){mCSB_container.css({"position":"absolute","width":"auto"}).wrap("<div class='mCSB_h_wrapper' style='position:relative; left:0; width:999999px;' />").css({"width":mCSB_container.outerWidth(),"position":"relative"}).unwrap();}
var mCSB_containerW=mCSB_container.outerWidth();}else{var mCSB_buttonUp=mCSB_scrollTools.children(".mCSB_buttonUp"),mCSB_buttonDown=mCSB_scrollTools.children(".mCSB_buttonDown"),mCustomScrollBoxH=mCustomScrollBox.height(),mCSB_containerH=mCSB_container.outerHeight();}
if(mCSB_containerH>mCustomScrollBoxH&&!$this.data("horizontalScroll")&&!$(document).data("mCS-is-touch-device")){mCSB_scrollTools.css("display","block");var mCSB_draggerContainerH=mCSB_draggerContainer.height();if($this.data("autoDraggerLength")){var draggerH=Math.round(mCustomScrollBoxH/mCSB_containerH*mCSB_draggerContainerH),minDraggerH=mCSB_dragger.data("minDraggerHeight");if(draggerH<=minDraggerH){mCSB_dragger.css({"height":minDraggerH});}else if(draggerH>=mCSB_draggerContainerH-10){var mCSB_draggerContainerMaxH=mCSB_draggerContainerH-10;mCSB_dragger.css({"height":mCSB_draggerContainerMaxH});}else{mCSB_dragger.css({"height":draggerH});}
mCSB_dragger.children(".mCSB_dragger_bar").css({"line-height":mCSB_dragger.height()+"px"});}
var mCSB_draggerH=mCSB_dragger.height(),scrollAmount=(mCSB_containerH-mCustomScrollBoxH)/(mCSB_draggerContainerH-mCSB_draggerH);$this.data("scrollAmount",scrollAmount);$this.mCustomScrollbar("scrolling",mCustomScrollBox,mCSB_container,mCSB_draggerContainer,mCSB_dragger,mCSB_buttonUp,mCSB_buttonDown,mCSB_buttonLeft,mCSB_buttonRight);var mCSB_containerP=Math.abs(Math.round(mCSB_container.position().top));$this.mCustomScrollbar("scrollTo",mCSB_containerP,{callback:false});}else if(mCSB_containerW>mCustomScrollBoxW&&$this.data("horizontalScroll")&&!$(document).data("mCS-is-touch-device")){mCSB_scrollTools.css("display","block");var mCSB_draggerContainerW=mCSB_draggerContainer.width();if($this.data("autoDraggerLength")){var draggerW=Math.round(mCustomScrollBoxW/mCSB_containerW*mCSB_draggerContainerW),minDraggerW=mCSB_dragger.data("minDraggerWidth");if(draggerW<=minDraggerW){mCSB_dragger.css({"width":minDraggerW});}else if(draggerW>=mCSB_draggerContainerW-10){var mCSB_draggerContainerMaxW=mCSB_draggerContainerW-10;mCSB_dragger.css({"width":mCSB_draggerContainerMaxW});}else{mCSB_dragger.css({"width":draggerW});}}
var mCSB_draggerW=mCSB_dragger.width(),scrollAmount=(mCSB_containerW-mCustomScrollBoxW)/(mCSB_draggerContainerW-mCSB_draggerW);$this.data("scrollAmount",scrollAmount);$this.mCustomScrollbar("scrolling",mCustomScrollBox,mCSB_container,mCSB_draggerContainer,mCSB_dragger,mCSB_buttonUp,mCSB_buttonDown,mCSB_buttonLeft,mCSB_buttonRight);var mCSB_containerP=Math.abs(Math.round(mCSB_container.position().left));$this.mCustomScrollbar("scrollTo",mCSB_containerP,{callback:false});}else{mCustomScrollBox.unbind("mousewheel");mCustomScrollBox.unbind("focusin");if($this.data("horizontalScroll")){mCSB_dragger.add(mCSB_container).css("left",0);}else{mCSB_dragger.add(mCSB_container).css("top",0);}
mCSB_scrollTools.css("display","none");mCSB_container.addClass("mCS_no_scrollbar");}},scrolling:function(mCustomScrollBox,mCSB_container,mCSB_draggerContainer,mCSB_dragger,mCSB_buttonUp,mCSB_buttonDown,mCSB_buttonLeft,mCSB_buttonRight){var $this=$(this);if(!mCSB_dragger.hasClass("ui-draggable")){if($this.data("horizontalScroll")){var draggableAxis="x";}else{var draggableAxis="y";}
mCSB_dragger.draggable({axis:draggableAxis,containment:"parent",drag:function(event,ui){$this.mCustomScrollbar("scroll");mCSB_dragger.addClass("mCSB_dragger_onDrag");},stop:function(event,ui){mCSB_dragger.removeClass("mCSB_dragger_onDrag");}});}
mCSB_draggerContainer.unbind("click").bind("click",function(e){if($this.data("horizontalScroll")){var mouseCoord=(e.pageX-mCSB_draggerContainer.offset().left);if(mouseCoord<mCSB_dragger.position().left||mouseCoord>(mCSB_dragger.position().left+mCSB_dragger.width())){var scrollToPos=mouseCoord;if(scrollToPos>=mCSB_draggerContainer.width()-mCSB_dragger.width()){scrollToPos=mCSB_draggerContainer.width()-mCSB_dragger.width();}
mCSB_dragger.css("left",scrollToPos);$this.mCustomScrollbar("scroll");}}else{var mouseCoord=(e.pageY-mCSB_draggerContainer.offset().top);if(mouseCoord<mCSB_dragger.position().top||mouseCoord>(mCSB_dragger.position().top+mCSB_dragger.height())){var scrollToPos=mouseCoord;if(scrollToPos>=mCSB_draggerContainer.height()-mCSB_dragger.height()){scrollToPos=mCSB_draggerContainer.height()-mCSB_dragger.height();}
mCSB_dragger.css("top",scrollToPos);$this.mCustomScrollbar("scroll");}}});if($this.data("mouseWheel")){var mousewheelVel=$this.data("mouseWheel");if($this.data("mouseWheel")==="auto"){mousewheelVel=8;var os=navigator.userAgent;if(os.indexOf("Mac")!=-1&&os.indexOf("Safari")!=-1&&os.indexOf("AppleWebKit")!=-1&&os.indexOf("Chrome")==-1){mousewheelVel=1;}}
mCustomScrollBox.unbind("mousewheel").bind("mousewheel",function(event,delta){event.preventDefault();var vel=Math.abs(delta*mousewheelVel);if($this.data("horizontalScroll")){var posX=mCSB_dragger.position().left-(delta*vel);mCSB_dragger.css("left",posX);if(mCSB_dragger.position().left<0){mCSB_dragger.css("left",0);}
var mCSB_draggerContainerW=mCSB_draggerContainer.width(),mCSB_draggerW=mCSB_dragger.width();if(mCSB_dragger.position().left>mCSB_draggerContainerW-mCSB_draggerW){mCSB_dragger.css("left",mCSB_draggerContainerW-mCSB_draggerW);}}else{var posY=mCSB_dragger.position().top-(delta*vel);mCSB_dragger.css("top",posY);if(mCSB_dragger.position().top<0){mCSB_dragger.css("top",0);}
var mCSB_draggerContainerH=mCSB_draggerContainer.height(),mCSB_draggerH=mCSB_dragger.height();if(mCSB_dragger.position().top>mCSB_draggerContainerH-mCSB_draggerH){mCSB_dragger.css("top",mCSB_draggerContainerH-mCSB_draggerH);}}
$this.mCustomScrollbar("scroll");});}
if($this.data("scrollButtons-enable")){if($this.data("scrollButtons-scrollType")==="pixels"){var pixelsScrollTo;if($.browser.msie&&parseInt($.browser.version)<9){$this.data("scrollInertia",0);}
if($this.data("horizontalScroll")){mCSB_buttonRight.add(mCSB_buttonLeft).unbind("click mousedown mouseup mouseout",mCSB_buttonRight_stop,mCSB_buttonLeft_stop);mCSB_buttonRight.bind("click",function(e){e.preventDefault();if(!mCSB_container.is(":animated")){pixelsScrollTo=Math.abs(mCSB_container.position().left)+$this.data("scrollButtons-scrollAmount");$this.mCustomScrollbar("scrollTo",pixelsScrollTo);}});mCSB_buttonLeft.bind("click",function(e){e.preventDefault();if(!mCSB_container.is(":animated")){pixelsScrollTo=Math.abs(mCSB_container.position().left)-$this.data("scrollButtons-scrollAmount");if(mCSB_container.position().left>=-$this.data("scrollButtons-scrollAmount")){pixelsScrollTo="left";}
$this.mCustomScrollbar("scrollTo",pixelsScrollTo);}});}else{mCSB_buttonDown.add(mCSB_buttonUp).unbind("click mousedown mouseup mouseout",mCSB_buttonDown_stop,mCSB_buttonUp_stop);mCSB_buttonDown.bind("click",function(e){e.preventDefault();if(!mCSB_container.is(":animated")){pixelsScrollTo=Math.abs(mCSB_container.position().top)+$this.data("scrollButtons-scrollAmount");$this.mCustomScrollbar("scrollTo",pixelsScrollTo);}});mCSB_buttonUp.bind("click",function(e){e.preventDefault();if(!mCSB_container.is(":animated")){pixelsScrollTo=Math.abs(mCSB_container.position().top)-$this.data("scrollButtons-scrollAmount");if(mCSB_container.position().top>=-$this.data("scrollButtons-scrollAmount")){pixelsScrollTo="top";}
$this.mCustomScrollbar("scrollTo",pixelsScrollTo);}});}}else{if($this.data("horizontalScroll")){mCSB_buttonRight.add(mCSB_buttonLeft).unbind("click mousedown mouseup mouseout",mCSB_buttonRight_stop,mCSB_buttonLeft_stop);var mCSB_buttonScrollRight,mCSB_draggerContainerW=mCSB_draggerContainer.width(),mCSB_draggerW=mCSB_dragger.width();mCSB_buttonRight.bind("mousedown",function(e){e.preventDefault();var draggerScrollTo=mCSB_draggerContainerW-mCSB_draggerW;mCSB_buttonScrollRight=setInterval(function(){var scrollToSpeed=Math.abs(mCSB_dragger.position().left-draggerScrollTo)*(100/$this.data("scrollButtons-scrollSpeed"));mCSB_dragger.stop().animate({left:draggerScrollTo},scrollToSpeed,"linear");$this.mCustomScrollbar("scroll");},20);});var mCSB_buttonRight_stop=function(e){e.preventDefault();clearInterval(mCSB_buttonScrollRight);mCSB_dragger.stop();}
mCSB_buttonRight.bind("mouseup mouseout",mCSB_buttonRight_stop);var mCSB_buttonScrollLeft;mCSB_buttonLeft.bind("mousedown",function(e){e.preventDefault();var draggerScrollTo=0;mCSB_buttonScrollLeft=setInterval(function(){var scrollToSpeed=Math.abs(mCSB_dragger.position().left-draggerScrollTo)*(100/$this.data("scrollButtons-scrollSpeed"));mCSB_dragger.stop().animate({left:draggerScrollTo},scrollToSpeed,"linear");$this.mCustomScrollbar("scroll");},20);});var mCSB_buttonLeft_stop=function(e){e.preventDefault();clearInterval(mCSB_buttonScrollLeft);mCSB_dragger.stop();}
mCSB_buttonLeft.bind("mouseup mouseout",mCSB_buttonLeft_stop);}else{mCSB_buttonDown.add(mCSB_buttonUp).unbind("click mousedown mouseup mouseout",mCSB_buttonDown_stop,mCSB_buttonUp_stop);var mCSB_buttonScrollDown,mCSB_draggerContainerH=mCSB_draggerContainer.height(),mCSB_draggerH=mCSB_dragger.height();mCSB_buttonDown.bind("mousedown",function(e){e.preventDefault();var draggerScrollTo=mCSB_draggerContainerH-mCSB_draggerH;mCSB_buttonScrollDown=setInterval(function(){var scrollToSpeed=Math.abs(mCSB_dragger.position().top-draggerScrollTo)*(100/$this.data("scrollButtons-scrollSpeed"));mCSB_dragger.stop().animate({top:draggerScrollTo},scrollToSpeed,"linear");$this.mCustomScrollbar("scroll");},20);});var mCSB_buttonDown_stop=function(e){e.preventDefault();clearInterval(mCSB_buttonScrollDown);mCSB_dragger.stop();}
mCSB_buttonDown.bind("mouseup mouseout",mCSB_buttonDown_stop);var mCSB_buttonScrollUp;mCSB_buttonUp.bind("mousedown",function(e){e.preventDefault();var draggerScrollTo=0;mCSB_buttonScrollUp=setInterval(function(){var scrollToSpeed=Math.abs(mCSB_dragger.position().top-draggerScrollTo)*(100/$this.data("scrollButtons-scrollSpeed"));mCSB_dragger.stop().animate({top:draggerScrollTo},scrollToSpeed,"linear");$this.mCustomScrollbar("scroll");},20);});var mCSB_buttonUp_stop=function(e){e.preventDefault();clearInterval(mCSB_buttonScrollUp);mCSB_dragger.stop();}
mCSB_buttonUp.bind("mouseup mouseout",mCSB_buttonUp_stop);}}}
mCustomScrollBox.unbind("focusin").bind("focusin",function(){mCustomScrollBox.scrollTop(0).scrollLeft(0);var focusedElem=$(document.activeElement);if(focusedElem.is("input,textarea,select,button,a[tabindex],area,object")){if($this.data("horizontalScroll")){var mCSB_containerX=mCSB_container.position().left,focusedElemX=focusedElem.position().left,mCustomScrollBoxW=mCustomScrollBox.width(),focusedElemW=focusedElem.outerWidth();if(mCSB_containerX+focusedElemX>=0&&mCSB_containerX+focusedElemX<=mCustomScrollBoxW-focusedElemW){}else{var moveDragger=focusedElemX/$this.data("scrollAmount");if(moveDragger>=mCSB_draggerContainer.width()-mCSB_dragger.width()){moveDragger=mCSB_draggerContainer.width()-mCSB_dragger.width();}
mCSB_dragger.css("left",moveDragger);$this.mCustomScrollbar("scroll");}}else{var mCSB_containerY=mCSB_container.position().top,focusedElemY=focusedElem.position().top,mCustomScrollBoxH=mCustomScrollBox.height(),focusedElemH=focusedElem.outerHeight();if(mCSB_containerY+focusedElemY>=0&&mCSB_containerY+focusedElemY<=mCustomScrollBoxH-focusedElemH){}else{var moveDragger=focusedElemY/$this.data("scrollAmount");if(moveDragger>=mCSB_draggerContainer.height()-mCSB_dragger.height()){moveDragger=mCSB_draggerContainer.height()-mCSB_dragger.height();}
mCSB_dragger.css("top",moveDragger);$this.mCustomScrollbar("scroll");}}}});},scroll:function(updated){var $this=$(this),mCSB_dragger=$this.find(".mCSB_dragger"),mCSB_container=$this.find(".mCSB_container"),mCustomScrollBox=$this.find(".mCustomScrollBox");if($this.data("horizontalScroll")){var draggerX=mCSB_dragger.position().left,targX=-draggerX*$this.data("scrollAmount"),thisX=mCSB_container.position().left,posX=Math.round(thisX-targX);}else{var draggerY=mCSB_dragger.position().top,targY=-draggerY*$this.data("scrollAmount"),thisY=mCSB_container.position().top,posY=Math.round(thisY-targY);}
if($.browser.webkit){var screenCssPixelRatio=(window.outerWidth-8)/window.innerWidth,isZoomed=(screenCssPixelRatio<.98||screenCssPixelRatio>1.02);}
if($this.data("scrollInertia")===0||isZoomed){if($this.data("horizontalScroll")){mCSB_container.css("left",targX);}else{mCSB_container.css("top",targY);}
if(!updated){$this.mCustomScrollbar("callbacks",mCustomScrollBox,mCSB_container);}}else{if($this.data("horizontalScroll")){mCSB_container.stop().animate({left:"-="+posX},$this.data("scrollInertia"),$this.data("scrollEasing"),function(){if(!updated){$this.mCustomScrollbar("callbacks",mCustomScrollBox,mCSB_container);}});}else{mCSB_container.stop().animate({top:"-="+posY},$this.data("scrollInertia"),$this.data("scrollEasing"),function(){if(!updated){$this.mCustomScrollbar("callbacks",mCustomScrollBox,mCSB_container);}});}}},scrollTo:function(scrollTo,options){var defaults={moveDragger:false,callback:true},options=$.extend(defaults,options),$this=$(this),scrollToPos,mCustomScrollBox=$this.find(".mCustomScrollBox"),mCSB_container=mCustomScrollBox.children(".mCSB_container");if(!$(document).data("mCS-is-touch-device")){var mCSB_draggerContainer=$this.find(".mCSB_draggerContainer"),mCSB_dragger=mCSB_draggerContainer.children(".mCSB_dragger");}
var targetPos;if(scrollTo){if(typeof(scrollTo)==="number"){if(options.moveDragger){scrollToPos=scrollTo;}else{targetPos=scrollTo;scrollToPos=Math.round(targetPos/$this.data("scrollAmount"));}}else if(typeof(scrollTo)==="string"){var target;if(scrollTo==="top"){target=0;}else if(scrollTo==="bottom"&&!$this.data("horizontalScroll")){target=mCSB_container.outerHeight()-mCustomScrollBox.height();}else if(scrollTo==="left"){target=0;}else if(scrollTo==="right"&&$this.data("horizontalScroll")){target=mCSB_container.outerWidth()-mCustomScrollBox.width();}else if(scrollTo==="first"){target=$this.find(".mCSB_container").find(":first");}else if(scrollTo==="last"){target=$this.find(".mCSB_container").find(":last");}else{target=$this.find(scrollTo);}
if(target.length===1){if($this.data("horizontalScroll")){targetPos=target.position().left;}else{targetPos=target.position().top;}
if($(document).data("mCS-is-touch-device")){scrollToPos=targetPos;}else{scrollToPos=Math.ceil(targetPos/$this.data("scrollAmount"));}}else{scrollToPos=target;}}
if($(document).data("mCS-is-touch-device")){if($this.data("horizontalScroll")){mCustomScrollBox.stop().animate({scrollLeft:scrollToPos},$this.data("scrollInertia"),$this.data("scrollEasing"),function(){if(options.callback){$this.mCustomScrollbar("callbacks",mCustomScrollBox,mCSB_container);}});}else{mCustomScrollBox.stop().animate({scrollTop:scrollToPos},$this.data("scrollInertia"),$this.data("scrollEasing"),function(){if(options.callback){$this.mCustomScrollbar("callbacks",mCustomScrollBox,mCSB_container);}});}}else{if($this.data("horizontalScroll")){if(scrollToPos>=mCSB_draggerContainer.width()-mCSB_dragger.width()){scrollToPos=mCSB_draggerContainer.width()-mCSB_dragger.width();}
mCSB_dragger.css("left",scrollToPos);}else{if(scrollToPos>=mCSB_draggerContainer.height()-mCSB_dragger.height()){scrollToPos=mCSB_draggerContainer.height()-mCSB_dragger.height();}
mCSB_dragger.css("top",scrollToPos);}
if(options.callback){$this.mCustomScrollbar("scroll");}else{$this.mCustomScrollbar("scroll",true);}}}},callbacks:function(mCustomScrollBox,mCSB_container){var $this=$(this);if(!$(document).data("mCS-is-touch-device")){if($this.data("horizontalScroll")){var mCSB_containerX=Math.round(mCSB_container.position().left);if(mCSB_containerX<0&&mCSB_containerX<=mCustomScrollBox.width()-mCSB_container.outerWidth()+$this.data("onTotalScroll-Offset")){$this.data("onTotalScroll-Callback").call();}else{$this.data("onScroll-Callback").call();}}else{var mCSB_containerY=Math.round(mCSB_container.position().top);if(mCSB_containerY<0&&mCSB_containerY<=mCustomScrollBox.height()-mCSB_container.outerHeight()+$this.data("onTotalScroll-Offset")){$this.data("onTotalScroll-Callback").call();}else{$this.data("onScroll-Callback").call();}}}else{if($this.data("horizontalScroll")){var mCustomScrollBoxX=Math.round(mCustomScrollBox.scrollLeft());if(mCustomScrollBoxX>0&&mCustomScrollBoxX>=mCSB_container.outerWidth()-$this.width()-$this.data("onTotalScroll-Offset")){$this.data("onTotalScroll-Callback").call();}else{$this.data("onScroll-Callback").call();}}else{var mCustomScrollBoxY=Math.round(mCustomScrollBox.scrollTop());if(mCustomScrollBoxY>0&&mCustomScrollBoxY>=mCSB_container.outerHeight()-$this.height()-$this.data("onTotalScroll-Offset")){$this.data("onTotalScroll-Callback").call();}else{$this.data("onScroll-Callback").call();}}}}}
$.fn.mCustomScrollbar=function(method){if(methods[method]){return methods[method].apply(this,Array.prototype.slice.call(arguments,1));}else if(typeof method==="object"||!method){return methods.init.apply(this,arguments);}else{$.error("Method "+method+" does not exist");}};})(jQuery);