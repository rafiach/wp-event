(()=>{var e,t,n;e=jQuery,t=window.ModuleBuilderModal,n={init:function(){e("#edd_download_files .edd-add-repeatable-row").append('<div class="igd-edd"><button type="button" class="button button-secondary igd-edd-button"><img src="'.concat(igd.pluginUrl,'/assets/images/drive.png" width="20"/><span>').concat(wp.i18n.__("Add File","integrate-google-drive"),"</span></button></div>")),e(document).on("click",".igd-edd-button",(function(e){e.preventDefault(),Swal.fire({html:'<div id="igd-select-files" class="igd-module-builder-modal-wrap"></div>',showConfirmButton:!1,customClass:{container:"igd-module-builder-modal-container"},didOpen:function(e){var d=document.getElementById("igd-select-files");ReactDOM.render(React.createElement(t,{initData:{},onUpdate:function(e){n.insertFiles(e),Swal.close()},onClose:function(){return Swal.close()},isSelectFiles:!0}),d)},willClose:function(e){var t=document.getElementById("igd-select-files");ReactDOM.unmountComponentAtNode(t)}})}))},insertFiles:function(t){var n=t.folders;(void 0===n?[]:n).map((function(t){var n=t.id,d=t.name,i=(t.type,t.accountId),a="\n                https://drive.google.com/open?action=igd-edd-download&id=".concat(n,"&account_id=").concat(i),o=e(".igd-edd").parents(".edd_repeatable_table").find(".edd_repeatable_row:last"),c=function(t){var n,d,i=n=1;return t.parent().find(".edd_repeatable_row").each((function(){var t=e(this).data("key");parseInt(t)>n&&(n=t)})),i=n+=1,(d=t.clone()).removeClass("edd_add_blank"),d.attr("data-key",i),d.find("input, select, textarea").val("").each((function(){var t=e(this).attr("name"),n=e(this).attr("id");t&&(t=t.replace(/\[(\d+)\]/,"["+parseInt(i)+"]"),e(this).attr("name",t)),e(this).attr("data-key",i),void 0!==n&&(n=n.replace(/(\d+)/,parseInt(i)),e(this).attr("id",n))})),d.find("select").each((function(){e(this).val(t.find('select[name="'+e(this).attr("name")+'"]').val())})),d.find('input[type="checkbox"]').each((function(){e(this).is(":checked")&&e(this).prop("checked",!1),e(this).val(1)})),d.find("span.edd_price_id").each((function(){e(this).text(parseInt(i))})),d.find("span.edd_file_id").each((function(){e(this).text(parseInt(i))})),d.find(".edd_repeatable_default_input").each((function(){e(this).val(parseInt(i)).removeAttr("checked")})),d.find(".edd_repeatable_index").each((function(){e(this).val(parseInt(i))})),d.find(".edd_repeatable_condition_field").each((function(){e(this).find("option:eq(0)").prop("selected","selected")})),d.find(".search-choice").remove(),d.find(".chosen-container").remove(),d}(o);c.find(".edd_repeatable_name_field").val(d),c.find(".edd_repeatable_upload_field").val(a),c.insertAfter(o).find("input, textarea, select").filter(":visible").eq(0).focus(),c.find(".edd-select-chosen").chosen({inherit_select_classes:!0,placeholder_text_single:edd_vars.one_option,placeholder_text_multiple:edd_vars.one_or_more_option}),c.find(".edd-select-chosen").css("width","100%"),c.find(".edd-select-chosen .chosen-search input").attr("placeholder",edd_vars.search_placeholder)}))}},e(document).ready(n.init)})();