var modal=document.querySelector(".game-modal");var closeButton=document.querySelector(".game-modal-close-button");closeButton.addEventListener("click",function(){$(modal).fadeOut(300)
document.body.style.overflow='auto';$('.game-modal-guts').html('');});function openModalTrigger(data){$(modal).fadeIn(700)
document.body.style.overflow='hidden';loadGame(data);}
function loadGame(data){if('URLSearchParams'in window){new URLSearchParams(window.location.search).forEach(function(value,key){data[key]=value})}else{var urlParamsEntities=getUrlParameters()
for(var property in urlParamsEntities){data[property]=urlParamsEntities[property]}}
data.language=document.documentElement.lang
data.modal_popup=true
if(window.hasOwnProperty('dataLayer'))
window.dataLayer.push({'event':'slot-popup','popup-target':data.href});$.ajax({type:'GET',url:'/includes/ajax/game-modal-ajax.php',dataType:"html",data:data,success:function(data){$('.game-modal-guts').html(data);new LazyLoad({elements_selector:".game-modal-guts img.lazy",threshold:0,});if(!checkIfMobileGameIsWorking()){closeButton.click()}
$('.game-modal .report-link').attr('disabled',true)},error:function(e){console.error(e);}});}
$(document).on('click','.game-modal-trigger-class a',gameModalTriggerEvent);$(document).on('auxclick','.game-modal-trigger-class a',gameModalTriggerEvent);$('.game-modal-trigger-class-redirect').on('click','a',gameModalTriggerEventRedirect);$('.game-modal-trigger-class-redirect').on('auxclick','a',gameModalTriggerEventRedirect);function gameModalTriggerEvent(){if($(this).data('popup')){event.preventDefault()
event.stopPropagation()
openModalTrigger({href:$(this).attr('href')})
return false;}}
function gameModalTriggerEventRedirect(){if($(this).data('popup')){event.preventDefault()
event.stopPropagation()
var href=$(this).attr('href')
var redirect=$(this).data('redirect')
if(redirect==='table-games'){window.location.href=table_game_url+'?popuphref='+href;}else{window.location.href=free_game_url+'?popuphref='+href;}
return false;}}
function getUrlParameters(){var sPageURL=window.location.search.substring(1);var sURLVariables=sPageURL.split('&');var data={}
for(var i=0;i<sURLVariables.length;i++)
{var sParameterName=sURLVariables[i].split('=');data[sParameterName[0]]=sParameterName[1]}
return data;}
function findUrlParameter(sParam){var sPageURL=window.location.search.substring(1);var sURLVariables=sPageURL.split('&');for(var i=0;i<sURLVariables.length;i++){var sParameterName=sURLVariables[i].split('=');if(sParameterName[0]==sParam){return sParameterName[1];}}}
function checkIfMobileGameIsWorking(){if($('body').hasClass('is-mobile')){if($('.game-modal .table-flash-mobile-container').length>1){$('.game-modal .table-flash-mobile-container').last().remove();}
if(!$('.game-modal .flash-game-container').length&&$('.game-modal .table-flash-mobile-container').length){alert(not_available_translation);return false;}}
return true;}
(function(){var href,has_entity='';if('URLSearchParams'in window){var urlParamsEntities=new URLSearchParams(window.location.search)
has_entity=urlParamsEntities.has('popuphref');href=has_entity?urlParamsEntities.get('popuphref'):''}else{has_entity=href=findUrlParameter('popuphref')}
if(has_entity){history.replaceState({},document.title,window.location.pathname);openModalTrigger({href:href})}})()