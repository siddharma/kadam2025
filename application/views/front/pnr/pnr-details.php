<?php $this->load->view('front/common/header.php'); ?>
<?php $this->load->view('front/common/left-menu.php'); ?>

<style>

#progress-bar {background-color: #12CC1A;height:20px;color: #FFFFFF;width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s;}
.btnSubmit{background-color:#09f;border:0;padding:10px 40px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
#progress-div {border:#0FA015 1px solid;padding: 5px 0px;margin:30px 0px;border-radius:4px;text-align:center;}
#targetLayer{width:100%;text-align:center;}

</style>
<script src="https://code.jquery.com/jquery-1.8.0.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>
/* jquery.form.min.js */
(function(e){"use strict";if(typeof define==="function"&&define.amd){define(["jquery"],e)}else{e(typeof jQuery!="undefined"?jQuery:window.Zepto)}})(function(e){"use strict";function r(t){var n=t.data;if(!t.isDefaultPrevented()){t.preventDefault();e(t.target).ajaxSubmit(n)}}function i(t){var n=t.target;var r=e(n);if(!r.is("[type=submit],[type=image]")){var i=r.closest("[type=submit]");if(i.length===0){return}n=i[0]}var s=this;s.clk=n;if(n.type=="image"){if(t.offsetX!==undefined){s.clk_x=t.offsetX;s.clk_y=t.offsetY}else if(typeof e.fn.offset=="function"){var o=r.offset();s.clk_x=t.pageX-o.left;s.clk_y=t.pageY-o.top}else{s.clk_x=t.pageX-n.offsetLeft;s.clk_y=t.pageY-n.offsetTop}}setTimeout(function(){s.clk=s.clk_x=s.clk_y=null},100)}function s(){if(!e.fn.ajaxSubmit.debug){return}var t="[jquery.form] "+Array.prototype.join.call(arguments,"");if(window.console&&window.console.log){window.console.log(t)}else if(window.opera&&window.opera.postError){window.opera.postError(t)}}var t={};t.fileapi=e("<input type='file'/>").get(0).files!==undefined;t.formdata=window.FormData!==undefined;var n=!!e.fn.prop;e.fn.attr2=function(){if(!n){return this.attr.apply(this,arguments)}var e=this.prop.apply(this,arguments);if(e&&e.jquery||typeof e==="string"){return e}return this.attr.apply(this,arguments)};e.fn.ajaxSubmit=function(r){function k(t){var n=e.param(t,r.traditional).split("&");var i=n.length;var s=[];var o,u;for(o=0;o<i;o++){n[o]=n[o].replace(/\+/g," ");u=n[o].split("=");s.push([decodeURIComponent(u[0]),decodeURIComponent(u[1])])}return s}function L(t){var n=new FormData;for(var s=0;s<t.length;s++){n.append(t[s].name,t[s].value)}if(r.extraData){var o=k(r.extraData);for(s=0;s<o.length;s++){if(o[s]){n.append(o[s][0],o[s][1])}}}r.data=null;var u=e.extend(true,{},e.ajaxSettings,r,{contentType:false,processData:false,cache:false,type:i||"POST"});if(r.uploadProgress){u.xhr=function(){var t=e.ajaxSettings.xhr();if(t.upload){t.upload.addEventListener("progress",function(e){var t=0;var n=e.loaded||e.position;var i=e.total;if(e.lengthComputable){t=Math.ceil(n/i*100)}r.uploadProgress(e,n,i,t)},false)}return t}}u.data=null;var a=u.beforeSend;u.beforeSend=function(e,t){if(r.formData){t.data=r.formData}else{t.data=n}if(a){a.call(this,e,t)}};return e.ajax(u)}function A(t){function T(e){var t=null;try{if(e.contentWindow){t=e.contentWindow.document}}catch(n){s("cannot get iframe.contentWindow document: "+n)}if(t){return t}try{t=e.contentDocument?e.contentDocument:e.document}catch(n){s("cannot get iframe.contentDocument: "+n);t=e.document}return t}function k(){function f(){try{var e=T(v).readyState;s("state = "+e);if(e&&e.toLowerCase()=="uninitialized"){setTimeout(f,50)}}catch(t){s("Server abort: ",t," (",t.name,")");_(x);if(w){clearTimeout(w)}w=undefined}}var t=a.attr2("target"),n=a.attr2("action"),r="multipart/form-data",u=a.attr("enctype")||a.attr("encoding")||r;o.setAttribute("target",p);if(!i||/post/i.test(i)){o.setAttribute("method","POST")}if(n!=l.url){o.setAttribute("action",l.url)}if(!l.skipEncodingOverride&&(!i||/post/i.test(i))){a.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"})}if(l.timeout){w=setTimeout(function(){b=true;_(S)},l.timeout)}var c=[];try{if(l.extraData){for(var h in l.extraData){if(l.extraData.hasOwnProperty(h)){if(e.isPlainObject(l.extraData[h])&&l.extraData[h].hasOwnProperty("name")&&l.extraData[h].hasOwnProperty("value")){c.push(e('<input type="hidden" name="'+l.extraData[h].name+'">').val(l.extraData[h].value).appendTo(o)[0])}else{c.push(e('<input type="hidden" name="'+h+'">').val(l.extraData[h]).appendTo(o)[0])}}}}if(!l.iframeTarget){d.appendTo("body")}if(v.attachEvent){v.attachEvent("onload",_)}else{v.addEventListener("load",_,false)}setTimeout(f,15);try{o.submit()}catch(m){var g=document.createElement("form").submit;g.apply(o)}}finally{o.setAttribute("action",n);o.setAttribute("enctype",u);if(t){o.setAttribute("target",t)}else{a.removeAttr("target")}e(c).remove()}}function _(t){if(m.aborted||M){return}A=T(v);if(!A){s("cannot access response document");t=x}if(t===S&&m){m.abort("timeout");E.reject(m,"timeout");return}else if(t==x&&m){m.abort("server abort");E.reject(m,"error","server abort");return}if(!A||A.location.href==l.iframeSrc){if(!b){return}}if(v.detachEvent){v.detachEvent("onload",_)}else{v.removeEventListener("load",_,false)}var n="success",r;try{if(b){throw"timeout"}var i=l.dataType=="xml"||A.XMLDocument||e.isXMLDoc(A);s("isXml="+i);if(!i&&window.opera&&(A.body===null||!A.body.innerHTML)){if(--O){s("requeing onLoad callback, DOM not available");setTimeout(_,250);return}}var o=A.body?A.body:A.documentElement;m.responseText=o?o.innerHTML:null;m.responseXML=A.XMLDocument?A.XMLDocument:A;if(i){l.dataType="xml"}m.getResponseHeader=function(e){var t={"content-type":l.dataType};return t[e.toLowerCase()]};if(o){m.status=Number(o.getAttribute("status"))||m.status;m.statusText=o.getAttribute("statusText")||m.statusText}var u=(l.dataType||"").toLowerCase();var a=/(json|script|text)/.test(u);if(a||l.textarea){var f=A.getElementsByTagName("textarea")[0];if(f){m.responseText=f.value;m.status=Number(f.getAttribute("status"))||m.status;m.statusText=f.getAttribute("statusText")||m.statusText}else if(a){var c=A.getElementsByTagName("pre")[0];var p=A.getElementsByTagName("body")[0];if(c){m.responseText=c.textContent?c.textContent:c.innerText}else if(p){m.responseText=p.textContent?p.textContent:p.innerText}}}else if(u=="xml"&&!m.responseXML&&m.responseText){m.responseXML=D(m.responseText)}try{L=H(m,u,l)}catch(g){n="parsererror";m.error=r=g||n}}catch(g){s("error caught: ",g);n="error";m.error=r=g||n}if(m.aborted){s("upload aborted");n=null}if(m.status){n=m.status>=200&&m.status<300||m.status===304?"success":"error"}if(n==="success"){if(l.success){l.success.call(l.context,L,"success",m)}E.resolve(m.responseText,"success",m);if(h){e.event.trigger("ajaxSuccess",[m,l])}}else if(n){if(r===undefined){r=m.statusText}if(l.error){l.error.call(l.context,m,n,r)}E.reject(m,"error",r);if(h){e.event.trigger("ajaxError",[m,l,r])}}if(h){e.event.trigger("ajaxComplete",[m,l])}if(h&&!--e.active){e.event.trigger("ajaxStop")}if(l.complete){l.complete.call(l.context,m,n)}M=true;if(l.timeout){clearTimeout(w)}setTimeout(function(){if(!l.iframeTarget){d.remove()}else{d.attr("src",l.iframeSrc)}m.responseXML=null},100)}var o=a[0],u,f,l,h,p,d,v,m,g,y,b,w;var E=e.Deferred();E.abort=function(e){m.abort(e)};if(t){for(f=0;f<c.length;f++){u=e(c[f]);if(n){u.prop("disabled",false)}else{u.removeAttr("disabled")}}}l=e.extend(true,{},e.ajaxSettings,r);l.context=l.context||l;p="jqFormIO"+(new Date).getTime();if(l.iframeTarget){d=e(l.iframeTarget);y=d.attr2("name");if(!y){d.attr2("name",p)}else{p=y}}else{d=e('<iframe name="'+p+'" src="'+l.iframeSrc+'" />');d.css({position:"absolute",top:"-1000px",left:"-1000px"})}v=d[0];m={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(t){var n=t==="timeout"?"timeout":"aborted";s("aborting upload... "+n);this.aborted=1;try{if(v.contentWindow.document.execCommand){v.contentWindow.document.execCommand("Stop")}}catch(r){}d.attr("src",l.iframeSrc);m.error=n;if(l.error){l.error.call(l.context,m,n,t)}if(h){e.event.trigger("ajaxError",[m,l,n])}if(l.complete){l.complete.call(l.context,m,n)}}};h=l.global;if(h&&0===e.active++){e.event.trigger("ajaxStart")}if(h){e.event.trigger("ajaxSend",[m,l])}if(l.beforeSend&&l.beforeSend.call(l.context,m,l)===false){if(l.global){e.active--}E.reject();return E}if(m.aborted){E.reject();return E}g=o.clk;if(g){y=g.name;if(y&&!g.disabled){l.extraData=l.extraData||{};l.extraData[y]=g.value;if(g.type=="image"){l.extraData[y+".x"]=o.clk_x;l.extraData[y+".y"]=o.clk_y}}}var S=1;var x=2;var N=e("meta[name=csrf-token]").attr("content");var C=e("meta[name=csrf-param]").attr("content");if(C&&N){l.extraData=l.extraData||{};l.extraData[C]=N}if(l.forceSync){k()}else{setTimeout(k,10)}var L,A,O=50,M;var D=e.parseXML||function(e,t){if(window.ActiveXObject){t=new ActiveXObject("Microsoft.XMLDOM");t.async="false";t.loadXML(e)}else{t=(new DOMParser).parseFromString(e,"text/xml")}return t&&t.documentElement&&t.documentElement.nodeName!="parsererror"?t:null};var P=e.parseJSON||function(e){return window["eval"]("("+e+")")};var H=function(t,n,r){var i=t.getResponseHeader("content-type")||"",s=n==="xml"||!n&&i.indexOf("xml")>=0,o=s?t.responseXML:t.responseText;if(s&&o.documentElement.nodeName==="parsererror"){if(e.error){e.error("parsererror")}}if(r&&r.dataFilter){o=r.dataFilter(o,n)}if(typeof o==="string"){if(n==="json"||!n&&i.indexOf("json")>=0){o=P(o)}else if(n==="script"||!n&&i.indexOf("javascript")>=0){e.globalEval(o)}}return o};return E}if(!this.length){s("ajaxSubmit: skipping submit process - no element selected");return this}var i,o,u,a=this;if(typeof r=="function"){r={success:r}}else if(r===undefined){r={}}i=r.type||this.attr2("method");o=r.url||this.attr2("action");u=typeof o==="string"?e.trim(o):"";u=u||window.location.href||"";if(u){u=(u.match(/^([^#]+)/)||[])[1]}r=e.extend(true,{url:u,success:e.ajaxSettings.success,type:i||e.ajaxSettings.type,iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},r);var f={};this.trigger("form-pre-serialize",[this,r,f]);if(f.veto){s("ajaxSubmit: submit vetoed via form-pre-serialize trigger");return this}if(r.beforeSerialize&&r.beforeSerialize(this,r)===false){s("ajaxSubmit: submit aborted via beforeSerialize callback");return this}var l=r.traditional;if(l===undefined){l=e.ajaxSettings.traditional}var c=[];var h,p=this.formToArray(r.semantic,c);if(r.data){r.extraData=r.data;h=e.param(r.data,l)}if(r.beforeSubmit&&r.beforeSubmit(p,this,r)===false){s("ajaxSubmit: submit aborted via beforeSubmit callback");return this}this.trigger("form-submit-validate",[p,this,r,f]);if(f.veto){s("ajaxSubmit: submit vetoed via form-submit-validate trigger");return this}var d=e.param(p,l);if(h){d=d?d+"&"+h:h}if(r.type.toUpperCase()=="GET"){r.url+=(r.url.indexOf("?")>=0?"&":"?")+d;r.data=null}else{r.data=d}var v=[];if(r.resetForm){v.push(function(){a.resetForm()})}if(r.clearForm){v.push(function(){a.clearForm(r.includeHidden)})}if(!r.dataType&&r.target){var m=r.success||function(){};v.push(function(t){var n=r.replaceTarget?"replaceWith":"html";e(r.target)[n](t).each(m,arguments)})}else if(r.success){v.push(r.success)}r.success=function(e,t,n){var i=r.context||this;for(var s=0,o=v.length;s<o;s++){v[s].apply(i,[e,t,n||a,a])}};if(r.error){var g=r.error;r.error=function(e,t,n){var i=r.context||this;g.apply(i,[e,t,n,a])}}if(r.complete){var y=r.complete;r.complete=function(e,t){var n=r.context||this;y.apply(n,[e,t,a])}}var b=e("input[type=file]:enabled",this).filter(function(){return e(this).val()!==""});var w=b.length>0;var E="multipart/form-data";var S=a.attr("enctype")==E||a.attr("encoding")==E;var x=t.fileapi&&t.formdata;s("fileAPI :"+x);var T=(w||S)&&!x;var N;if(r.iframe!==false&&(r.iframe||T)){if(r.closeKeepAlive){e.get(r.closeKeepAlive,function(){N=A(p)})}else{N=A(p)}}else if((w||S)&&x){N=L(p)}else{N=e.ajax(r)}a.removeData("jqxhr").data("jqxhr",N);for(var C=0;C<c.length;C++){c[C]=null}this.trigger("form-submit-notify",[this,r]);return this};e.fn.ajaxForm=function(t){t=t||{};t.delegation=t.delegation&&e.isFunction(e.fn.on);if(!t.delegation&&this.length===0){var n={s:this.selector,c:this.context};if(!e.isReady&&n.s){s("DOM not ready, queuing ajaxForm");e(function(){e(n.s,n.c).ajaxForm(t)});return this}s("terminating; zero elements found by selector"+(e.isReady?"":" (DOM not ready)"));return this}if(t.delegation){e(document).off("submit.form-plugin",this.selector,r).off("click.form-plugin",this.selector,i).on("submit.form-plugin",this.selector,t,r).on("click.form-plugin",this.selector,t,i);return this}return this.ajaxFormUnbind().bind("submit.form-plugin",t,r).bind("click.form-plugin",t,i)};e.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")};e.fn.formToArray=function(n,r){var i=[];if(this.length===0){return i}var s=this[0];var o=this.attr("id");var u=n?s.getElementsByTagName("*"):s.elements;var a;if(u&&!/MSIE [678]/.test(navigator.userAgent)){u=e(u).get()}if(o){a=e(':input[form="'+o+'"]').get();if(a.length){u=(u||[]).concat(a)}}if(!u||!u.length){return i}var f,l,c,h,p,d,v;for(f=0,d=u.length;f<d;f++){p=u[f];c=p.name;if(!c||p.disabled){continue}if(n&&s.clk&&p.type=="image"){if(s.clk==p){i.push({name:c,value:e(p).val(),type:p.type});i.push({name:c+".x",value:s.clk_x},{name:c+".y",value:s.clk_y})}continue}h=e.fieldValue(p,true);if(h&&h.constructor==Array){if(r){r.push(p)}for(l=0,v=h.length;l<v;l++){i.push({name:c,value:h[l]})}}else if(t.fileapi&&p.type=="file"){if(r){r.push(p)}var m=p.files;if(m.length){for(l=0;l<m.length;l++){i.push({name:c,value:m[l],type:p.type})}}else{i.push({name:c,value:"",type:p.type})}}else if(h!==null&&typeof h!="undefined"){if(r){r.push(p)}i.push({name:c,value:h,type:p.type,required:p.required})}}if(!n&&s.clk){var g=e(s.clk),y=g[0];c=y.name;if(c&&!y.disabled&&y.type=="image"){i.push({name:c,value:g.val()});i.push({name:c+".x",value:s.clk_x},{name:c+".y",value:s.clk_y})}}return i};e.fn.formSerialize=function(t){return e.param(this.formToArray(t))};e.fn.fieldSerialize=function(t){var n=[];this.each(function(){var r=this.name;if(!r){return}var i=e.fieldValue(this,t);if(i&&i.constructor==Array){for(var s=0,o=i.length;s<o;s++){n.push({name:r,value:i[s]})}}else if(i!==null&&typeof i!="undefined"){n.push({name:this.name,value:i})}});return e.param(n)};e.fn.fieldValue=function(t){for(var n=[],r=0,i=this.length;r<i;r++){var s=this[r];var o=e.fieldValue(s,t);if(o===null||typeof o=="undefined"||o.constructor==Array&&!o.length){continue}if(o.constructor==Array){e.merge(n,o)}else{n.push(o)}}return n};e.fieldValue=function(t,n){var r=t.name,i=t.type,s=t.tagName.toLowerCase();if(n===undefined){n=true}if(n&&(!r||t.disabled||i=="reset"||i=="button"||(i=="checkbox"||i=="radio")&&!t.checked||(i=="submit"||i=="image")&&t.form&&t.form.clk!=t||s=="select"&&t.selectedIndex==-1)){return null}if(s=="select"){var o=t.selectedIndex;if(o<0){return null}var u=[],a=t.options;var f=i=="select-one";var l=f?o+1:a.length;for(var c=f?o:0;c<l;c++){var h=a[c];if(h.selected){var p=h.value;if(!p){p=h.attributes&&h.attributes.value&&!h.attributes.value.specified?h.text:h.value}if(f){return p}u.push(p)}}return u}return e(t).val()};e.fn.clearForm=function(t){return this.each(function(){e("input,select,textarea",this).clearFields(t)})};e.fn.clearFields=e.fn.clearInputs=function(t){var n=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each(function(){var r=this.type,i=this.tagName.toLowerCase();if(n.test(r)||i=="textarea"){this.value=""}else if(r=="checkbox"||r=="radio"){this.checked=false}else if(i=="select"){this.selectedIndex=-1}else if(r=="file"){if(/MSIE/.test(navigator.userAgent)){e(this).replaceWith(e(this).clone(true))}else{e(this).val("")}}else if(t){if(t===true&&/hidden/.test(r)||typeof t=="string"&&e(this).is(t)){this.value=""}}})};e.fn.resetForm=function(){return this.each(function(){if(typeof this.reset=="function"||typeof this.reset=="object"&&!this.reset.nodeType){this.reset()}})};e.fn.enable=function(e){if(e===undefined){e=true}return this.each(function(){this.disabled=!e})};e.fn.selected=function(t){if(t===undefined){t=true}return this.each(function(){var n=this.type;if(n=="checkbox"||n=="radio"){this.checked=t}else if(this.tagName.toLowerCase()=="option"){var r=e(this).parent("select");if(t&&r[0]&&r[0].type=="select-one"){r.find("option").selected(false)}this.selected=t}})};e.fn.ajaxSubmit.debug=false})
</script>

<script type="text/javascript">
$(document).ready(function() { 
	 $('#hier-form').submit(function(e) {	
		if($('#userImg').val()) {
			e.preventDefault();
			$('#loader-icon').show();
			$(this).ajaxSubmit({ 
				target:   '#targetLayer', 
				beforeSubmit: function() {
				  $("#progress-bar").width('0%');
				},
				uploadProgress: function (event, position, total, percentComplete){	
					$("#progress-bar").width(percentComplete + '%');
					$("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>')
				},
				success:function (){
					$('#loader-icon').hide();
				},
				resetForm: true 
			}); 
			return false; 
		}
	});
}); 

</script>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>PNR Update</h1>
        </div>
        
      </div>
      <div class="col-md-12">
          <form width="100%;" enctype="multipart/form-data"  id="hier-form" action="<?php echo base_url();?>pnrupdate" method="post">
        <div class="col-md-6">
          <div class="tile">
            <h5 style="color:red">How Many Forms You Want To Active</h5>
           
            <div class="">
              <div id="form">  
            <?php 
            switch($arr_form_data['form_count']){
            case 1 :?>
                <span style="visibility:visible;"><input type="radio" name="form" value="1"  id="frm1" onchange="toggle();" ><span class="label-text chkright" id="myspan1" >Form1</b></span></span>
                <span style="visibility:visible;"><input type="radio" name="form" value="2"  id="frm2" onchange="toggle();" ><span class="label-text chkright" id="myspan2" style="visibility:visible;">Form2</span></span>
                <span style="visibility:hidden;"><input type="radio" name="form" value="3"  id="frm3" onchange="toggle();" ><span class="label-text chkright" id="myspan3" style="visibility:hidden;">Form3</span></span>
                <?php 
            break;case 2 :?>
                <span style="visibility:visible;"><input type="radio" name="form" value="1"  id="frm1" onchange="toggle();" ><span class="label-text chkright" id="myspan1" style="visibility:visible;">Form1</b></span></span>
                <span style="visibility:hidden;"><input type="radio" name="form" value="2"  id="frm2" onchange="toggle();" ><span class="label-text chkright" id="myspan2" style="visibility:hidden;">Form2</span></span>
                <span style="visibility:hidden;"><input type="radio" name="form" value="3"  id="frm3" onchange="toggle();" ><span class="label-text chkright" id="myspan3" style="visibility:hidden;">Form3</span></span>
                <?php 
           break; case 3 :?>
                <span style="visibility:hidden;"><input type="radio" name="form" value="1"  id="frm1" onchange="toggle();" ><span class="label-text chkright" id="myspan1" >Form1</span></span>
                <span style="visibility:hidden;"><input type="radio" name="form" value="2"  id="frm2" onchange="toggle();" ><span class="label-text chkright" id="myspan2" >Form2</span></span>
                <span style="visibility:hidden;"><input type="radio" name="form" value="3"  id="frm3" onchange="toggle();" ><span class="label-text chkright" id="myspan3" >Form3</span></span>
                <?php 
           break; case 0 :?>
                <span style="visibility:visible;"><input type="radio" name="form" value="1"  id="frm1" onchange="toggle();" ><span class="label-text chkright" id="myspan1" style="visibility:visible;">Form1</b></span></span>
                <span style="visibility:visible;"><input type="radio" name="form" value="2"  id="frm2" onchange="toggle();" ><span class="label-text chkright" id="myspan2" style="visibility:visible;">Form2</span></span>
                <span style="visibility:visible;"><input type="radio" name="form" value="3"  id="frm3" onchange="toggle();" ><span class="label-text chkright" id="myspan3" style="visibility:visible;">Form3</span></span>
            <?php break;default:
                break;}?>
              
                </div>
            </div>
            <div id="form1_div" style="background : red;color:#ffffff; text-align:center;font-weight: bold; margin:10px 10px;">Please Select Donor
          </div>
            <div>
           
            <?php foreach ($unactive_user as $inactive){?>
            <span id="User_usr_code" class="chkright "><input class="clikcnt" id="usr_code_<?php echo $inactive['user_sponser_id'];?>" value="<?php echo $inactive['user_sponser_id'];?>" type="checkbox" name="user_code[]" onclick="updateCount()"/>
                <label for="User_usr_code_0"><?php echo $inactive['user_sponser_id'];?></label>
            </span> 
            <?php }?>
            
          </div>
        </div>
        </div>
          <style>.chkright{padding: 10px 10px 10px 10px; }</style>
            <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h5 class="tile-title">Form Data</h5>
            <span><span style="color:red"><strong>Note : </strong></span><br>
                1) Do Not Provide Fake or Wrong PNR NO. , Otherwise Your Id will Be Blocked.<br/>
                2) Please Check Image Before Upload , It Must Be Readable.</span>
            <div id="pnr_update" class="table-responsive" style="visibility:hidden;">
              <table class="table">

                <tbody>
                    <?php 
                    for($i=12; $i>=1; $i--){ ?>
                        <tr>
                    <td>
                        <?php echo $sponsered_user['sponser_id'][$i];?>
                        <input type="hidden" name="pnr_holder<?php echo $i;?>" value="<?php echo $sponsered_user['sponser_id'][$i];?>">
                            <!-- <lable><b><?php echo '[ '.$sponsered_user['full_name'][$i].' ]';?></b></lable> -->
                    </td>
                    <td><input id="myInput" readonly class="myInput" onclick="myFunction()" value="<?php echo $sponsered_user['upi_address'][$i]?>"  /></td>
                    <td><input type="text" name="pnr_no<?php echo $i;?>" placeholder="Enter Transaction No." ></td>
                    
                    <td><input type="text" name="pnr_amount<?php echo $i;?>" style="width:50px" readonly></td>
                    <td><input type="file" name="pnr_holder_img_<?php echo $i;?>" /></td>
                  </tr>
                   <?php }
        
         ?>
          
                </tbody>
              </table>
            </div>
            <div class="clearfix"></div>
            <div class="form-group row" id='up_img' style="visibility:hidden;">
                
                <label class="control-label col-md-3"><strong>Upload Form Image</strong></label>
                  <div class="col-md-8">
                      <input class="form-control" type="file" name="userImg" id="userImg" required="required">
                  </div>
                </div>

             
             <div id="btndata" style="visibility:hidden;">
             <div class="form-group row">
                  <div class="col-md-8 col-md-offset-3">
                    <div class="form-check">
                      <label class="form-check-label">
                       You accept all <a href="#" target="_blank">Terms & Conditions</a> clicking on submit button.
                      </label>
                    </div>
                  </div>
                </div>
             <div id="progress-div"><div id="progress-bar"></div></div>
<div id="targetLayer"></div>

            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                    <input type="submit" class="btn btn-primary" id="btnpnr" name="btnpnr" value="Submit">
                </div>
              </div>
            </div>
            </div>
          </div>
          </div>
            </form>
       <div id="loader-icon" style="display:none;"><img src="<?php echo base_url();?>/media/front/images/LoaderIcon.gif" /></div>
          
     

<div class="col-md-12">
          <div class="tile table-responsive">
            <div class="tile-body">
           
          <h2><i class="fa fa-th-list"></i> My Directs</h2>
       
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>User Code</th>
                    <th>User Name</th>
                    <th>Register Date</th>
                    <th>Active Date</th>
                    <th>Remark</th>
                   
                  </tr>
                </thead>
                <tbody>
                     <?php $i=1;
                    foreach ($arr_team_data as $team){?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $team['user_sponser_id'];?></td>
                    <td><?php echo $team['full_name'];?></td>
                    <td><?php echo $team['register_date'];?></td>
                    <td><?php echo $team['activate_date'];?></td>
                    <td><?php echo $team['user_status'];?></td>
                   
                  </tr>
                    <?php }?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </div>
     </main>
<?php $this->load->view('front/common/footer.php'); ?>

   <script type="text/javascript" >

function myFunction() {
  // alert("Here");
  // Get the text field
  var copyText = document.getElementById("myInput");
  //var copyText = document.getElementsByClassName("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  alert("Copied " + copyText.value);
}
      
//var chklt = $('input[name="user_code[]"]:checked').length;
//alert('okk');
//alert(chklt);
 function toggle()
{
    var rate_value=0;
    var msg="";var i=0;
    if (document.getElementById('frm1').checked)
    {
      rate_value = document.getElementById('frm1').value;
      document.getElementById('up_img').style.visibility='visible';
//      document.getElementById('up_img1').style.visibility='hidden'; 
//      document.getElementById('up_img2').style.visibility='hidden'; 
      document.getElementById('pnr_update').style.visibility='visible'; 
      document.getElementById('btndata').style.visibility='visible'; 
      msg='Please Select Only '+rate_value+' Donor';
      changeForm(rate_value);
    }
    else if (document.getElementById('frm2').checked)
    {
      rate_value = document.getElementById('frm2').value;
      document.getElementById('up_img').style.visibility='visible';
//      document.getElementById('up_img1').style.visibility='visible'; 
//      document.getElementById('up_img2').style.visibility='hidden'; 
      document.getElementById('pnr_update').style.visibility='visible'; 
      document.getElementById('btndata').style.visibility='visible';
      msg='Please Select Only '+rate_value+' Donors';
      changeForm(rate_value);
      
    }
    else if (document.getElementById('frm3').checked)
    {
      rate_value = document.getElementById('frm3').value;
      document.getElementById('up_img').style.visibility='visible';
//      document.getElementById('up_img1').style.visibility='visible'; 
//      document.getElementById('up_img2').style.visibility='visible'; 
      document.getElementById('pnr_update').style.visibility='visible';
      document.getElementById('btndata').style.visibility='visible';
      msg='Please Select All Donors';
      changeForm(rate_value);
    }
    else if (document.getElementById('frm4').checked)
    {
       rate_value = document.getElementById('frm4').value;
       document.getElementById('up_img').style.visibility='visible';
//       document.getElementById('up_img1').style.visibility='hidden'; 
//       document.getElementById('up_img2').style.visibility='hidden';
//       document.getElementById('up_img3').style.visibility='visible';
       document.getElementById('pnr_update').style.visibility='hidden'; 
       document.getElementById('btndata').style.visibility='visible';
       msg='Please Select Donor';
    }
    
 document.getElementById('form1_div').innerHTML = msg;//'Please Select Only '+rate_value+' Donor';

 
 


function changeForm(rate_value) {

  if(rate_value < 3) {
      <?php 
  for($i=1;$i<13;$i++){
      $z = $i; //$i+1;
  ?>
    <?php if($z < 10) { ?>
    var amnt=<?php echo $global['level'.$z.'_amt'];?>;  
    <?php }  if($z > 9) { ?>
      var amnt=<?php echo $global['fix_level'.($z-9).'_amt'];?>;  
      <?php } ?>
          
    $('[name="pnr_amount<?php echo $i;?>"]').val(amnt);
        if(rate_value>0)
        {
            //name="pnr_holder"
            // $('[name="pnr_no<?php echo $i;?>"]').prop("required", true);
        }
  <?php  } ?>
  } else {

    <?php 
  for($i=1;$i<13;$i++){
      $z = $i; //$i+1;
  ?>
  var amnt = null;
    <?php if($z == 1) { ?>
    var amnt=<?php echo $global['form3_level1_amt'];?>;  
    <?php }  if($z > 9) { ?>
      var amnt=<?php echo $global['fix_level'.($z-9).'_amt'];?>;  
      <?php } ?>
          
    $('[name="pnr_amount<?php echo $i;?>"]').val(amnt);
        if(rate_value>0)
        {
            //name="pnr_holder"
            $('[name="pnr_no<?php echo $i;?>"]').prop("required", true);
        }
  <?php  } ?>
  }
  
}


 $('.clikcnt').prop("checked", false);
    if (rate_value == 3)
    {
      $('.clikcnt').prop("checked", true);
    }
    
    window.updateCount = function() {
    var x = $(".clikcnt:checked").length;
   
    if (x > rate_value)
    {
    alert('Please select only '+rate_value+' Checkboxes');
    $('.clikcnt').prop("checked", false);
    return false;
    }
   
};
 }

 
</script>     
        
