var theList,theExtraList;
(function(b){setIpCacheLogList=function(){function j(c){c=parseInt(c.html().replace(/[^0-9]+/g,""),10);if(isNaN(c))return 0;return c}function g(c,a){var d="";if(!isNaN(a)){a=a<1?"0":a.toString();if(a.length>3){for(;a.length>3;){d=thousandsSeparator+a.substr(a.length-3)+d;a=a.substr(0,a.length-3)}a+=d}c.html(a)}}var h,n,o,k=0,l;h=b('input[name="_total"]',"#ipcachelist-form");n=b('input[name="_per_page"]',"#ipcachelist-form");o=b('input[name="_page"]',"#ipcachelist-form");l=function(c,a,d){if(!(a<k)){if(d)k=
a;h.val(c.toString());b("span.total-type-count").each(function(){g(b(this),c)})}};var p=function(c){var a=b.query.get(),d=b(".total-pages").text(),e=b("input[name=_per_page]","#ipcachelist-form").val();if(!a.paged)a.paged=1;if(!(a.paged>d)){if(c){theExtraList.empty();a.number=Math.min(8,e)}else{a.number=1;a.offset=Math.min(8,e)-1}a.no_placeholder=true;a.paged++;if(true===a.comment_type)a.comment_type="";a=b.extend(a,{action:"fetch-list",list_args:list_args,_ajax_fetch_list_nonce:b("#_ajax_fetch_list_nonce").val()});
b.ajax({url:ajaxurl,global:false,dataType:"json",data:a,success:function(f){theExtraList.get(0).wpList.add(f.rows)}})}};theExtraList=b("#the-extra-ipcache-list").wpList({alt:"",delColor:"none",addColor:"none"});theList=b("#the-ipcache-list").wpList({alt:"",delBefore:function(c){c.data._total=h.val()||0;c.data._per_page=n.val()||0;c.data._page=o.val()||0;c.data._url=document.location.href;c.data.ip_status=b("input[name=ip_status]","#ipcachelist-form").val();return c},dimAfter:function(c,a){c=b("#"+
a.element);if(c.is(".spammed")){c.find("div.ip_status").html("1");c.find("td.spam").html("Spam")}else{c.find("div.ip_status").html("0");c.find("td.spam").html("Ham")}b("span.ham-count").each(function(){var d=b(this),e;e=b("#"+a.element).is("."+a.dimClass)?-1:1;e=j(d)+e;g(d,e)});b("span.spam-count").each(function(){var d=b(this),e;e=b("#"+a.element).is("."+a.dimClass)?1:-1;e=j(d)+e;g(d,e)})},delAfter:function(c,a){var d,e,f;d=b(a.target).parent().is("span.set_ham");var q=b(a.target).parent().is("span.set_spam"),
r=b(a.target).parent().is("span.set_blacklist"),s=b(a.target).parent().is("span.set_delete");b("#inline-"+a.data.id);if(d){e=-1;f=1}if(q){f=-1;e=1}if(r||s){t=b("div.ip_hamspam",b("#inline-"+a.data.id)).text();f=t=="ham"?-1:0;e=t=="spam"?-1:0}b("span.spam-count").each(function(){var i=b(this),m=j(i)+e;g(i,m)});b("span.ham-count").each(function(){var i=b(this),m=j(i)+f;g(i,m)});d=h.val()?parseInt(h.val(),10):0;d=d+f+e;if(d<0)d=0;if("object"==typeof c&&k<a.parsed.responses[0].supplemental.time){if(total_items_i18n=
a.parsed.responses[0].supplemental.total_items_i18n||""){b(".displaying-num").text(total_items_i18n);b(".total-pages").text(a.parsed.responses[0].supplemental.total_pages_i18n);b(".tablenav-pages").find(".next-page, .last-page").toggleClass("disabled",a.parsed.responses[0].supplemental.total_pages==b(".current-page").val())}l(d,a.parsed.responses[0].supplemental.time,true)}else l(d,c,false);if(!(!theExtraList||theExtraList.size()==0||theExtraList.children().size()==0)){theList.get(0).wpList.add(theExtraList.children(":eq(0)").remove().clone());
p()}},addColor:"none"})};b(document).ready(function(){setIpCacheLogList();b(document).delegate("span.avhfdas_is_delete a.avhfdas_is_delete","click",function(){return false})})})(jQuery);