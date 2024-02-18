!function(){"use strict";var e=window.wp.element,t=JSON.parse('{"$schema":"https://json.schemastore.org/block.json","apiVersion":2,"name":"igd/view","version":"1.0.0","title":"Insert View Links","category":"igd-category","icon":"admin-links","description":"Insert links to view the files in Google Drive","supports":{"html":false},"attributes":{"isInit":{"type":"boolean","default":true},"isEdit":{"type":"boolean","default":true},"data":{"type":"object","default":{"status":"on","type":"view","folders":[],"showFiles":true,"showFolders":true,"fileNumbers":-1,"sort":{"sortBy":"name","sortDirection":"asc"},"width":"100%","height":"auto","view":"grid","maxFileSize":"","uploaderStyle":"simple","openNewTab":true,"download":true,"displayFor":"everyone","displayUsers":["everyone"],"displayExcept":[]}}},"keywords":["view links","link","view","google","drive","integrate google drive"],"textdomain":"integrate-google-drive","editorScript":"file:./index.js","editorStyle":"file:./index.css"}'),i=window.wp.components,n=window.wp.blockEditor;const{registerBlockType:l}=wp.blocks;l("igd/view",{...t,icon:(0,e.createElement)("svg",{width:"32",height:"30",viewBox:"0 0 32 30",fill:"none",xmlns:"http://www.w3.org/2000/svg"},(0,e.createElement)("g",{"clip-path":"url(#clip0_965_1932)"},(0,e.createElement)("path",{d:"M24.8153 13.8442C25.551 13.8442 26.2621 13.9447 26.9241 14.1206C26.9241 14.0201 26.9241 13.9196 26.9241 13.794C26.9241 6.1809 20.9165 0 13.4621 0C6.03218 0 0 6.1809 0 13.794C0 21.407 6.03218 27.5879 13.4621 27.5879C14.8107 27.5879 16.1349 27.3869 17.3609 26.9849C16.6253 25.7035 16.2084 24.196 16.2084 22.6131C16.233 17.7889 20.0828 13.8442 24.8153 13.8442ZM14.3939 18.4673C14.0506 18.8191 13.7073 19.196 13.3395 19.5477C12.6038 20.2513 11.7211 20.603 10.495 20.603C9.0728 20.5025 7.84674 19.7739 7.18467 18.2412C6.52261 16.7085 6.76782 15.2513 7.84674 13.9698C8.19004 13.5678 8.58238 13.191 8.95019 12.8141C9.41609 12.3618 10.0782 12.3618 10.495 12.8141C10.8874 13.2412 10.8628 13.8945 10.446 14.3719C10.1272 14.6985 9.80843 15.0251 9.48966 15.3518C8.80307 16.0804 8.80307 17.1859 9.48966 17.8894C10.1762 18.593 11.2552 18.593 11.9663 17.8894C12.2851 17.5879 12.5793 17.2613 12.8736 16.9598C13.364 16.4573 14.0261 16.4322 14.4674 16.8844C14.9088 17.3367 14.8843 17.9648 14.3939 18.4673ZM15.2276 13.5427C14.5655 14.2211 13.9034 14.9246 13.2169 15.603C12.7755 16.0553 12.1379 16.0301 11.7211 15.603C11.3042 15.1759 11.3042 14.5226 11.7211 14.0955C12.3831 13.392 13.0452 12.7136 13.7318 12.0352C14.0751 11.7085 14.492 11.6332 14.9088 11.8342C15.3011 12.01 15.4973 12.3618 15.5218 12.7889C15.5218 13.0653 15.4238 13.3166 15.2276 13.5427ZM17.459 9.72362C16.7479 8.99497 15.6935 9.0201 14.9579 9.74874C14.6636 10.0503 14.3693 10.3518 14.0751 10.6533C13.5847 11.1558 12.9226 11.1809 12.4812 10.7286C12.0398 10.2764 12.0644 9.64824 12.5548 9.14573C12.8981 8.79397 13.2414 8.44221 13.5847 8.09045C14.3203 7.36181 15.2276 7.03518 16.4536 7.01005C17.8759 7.08543 19.1019 7.8392 19.764 9.37186C20.4261 10.9045 20.1808 12.3367 19.1264 13.6181C18.7586 14.0452 18.3663 14.4221 17.9739 14.8241C17.5326 15.2513 16.9195 15.2513 16.5027 14.8492C16.0858 14.4221 16.0613 13.7688 16.5027 13.2915C16.8215 12.9397 17.1648 12.6131 17.4835 12.2864C18.1456 11.5327 18.1456 10.4271 17.459 9.72362Z",fill:"url(#paint0_linear_965_1932)"}),(0,e.createElement)("path",{d:"M24.8397 20.6282C23.7363 20.6282 22.8535 21.5076 22.8535 22.6131C22.8535 23.7186 23.7118 24.6231 24.7907 24.6231C25.8696 24.6231 26.7524 23.7438 26.7524 22.6382C26.7524 21.5327 25.8941 20.6282 24.8397 20.6282ZM24.7907 24.0704C24.006 24.0704 23.393 23.4422 23.4175 22.6382C23.4175 21.8342 24.0305 21.2061 24.8152 21.2061C25.5999 21.2061 26.2129 21.8342 26.2129 22.6382C26.2129 23.4422 25.5754 24.0704 24.7907 24.0704Z",fill:"url(#paint1_linear_965_1932)"}),(0,e.createElement)("path",{d:"M24.8153 15.2764C20.8429 15.2764 17.6306 18.5678 17.6306 22.6382C17.6306 26.7085 20.8429 30 24.8153 30C28.7877 30 32 26.7085 32 22.6382C32 18.5678 28.7877 15.2764 24.8153 15.2764ZM29.2291 23.0151C28.3708 24.0703 27.39 24.9497 26.0904 25.4271C25.6735 25.5779 25.2567 25.6533 24.8643 25.6533C23.8344 25.6281 22.9517 25.2512 22.167 24.6985C21.5295 24.2462 20.9655 23.6935 20.4751 23.0904C20.2544 22.8141 20.2298 22.5125 20.426 22.2613C21.2352 21.2563 22.1915 20.402 23.4176 19.9246C24.6436 19.4221 25.8207 19.598 26.9486 20.2512C27.8314 20.7538 28.5915 21.4321 29.2291 22.2362C29.4007 22.4623 29.4253 22.7638 29.2291 23.0151Z",fill:"url(#paint2_linear_965_1932)"})),(0,e.createElement)("defs",null,(0,e.createElement)("linearGradient",{id:"paint0_linear_965_1932",x1:"13.4621",y1:"0",x2:"13.4621",y2:"27.5879",gradientUnits:"userSpaceOnUse"},(0,e.createElement)("stop",{stopColor:"#A4C0FF"}),(0,e.createElement)("stop",{offset:"1",stopColor:"#2856BE"})),(0,e.createElement)("linearGradient",{id:"paint1_linear_965_1932",x1:"24.8029",y1:"20.6282",x2:"24.8029",y2:"24.6231",gradientUnits:"userSpaceOnUse"},(0,e.createElement)("stop",{stopColor:"#A4C0FF"}),(0,e.createElement)("stop",{offset:"1",stopColor:"#2856BE"})),(0,e.createElement)("linearGradient",{id:"paint2_linear_965_1932",x1:"24.8153",y1:"15.2764",x2:"24.8153",y2:"30",gradientUnits:"userSpaceOnUse"},(0,e.createElement)("stop",{stopColor:"#A4C0FF"}),(0,e.createElement)("stop",{offset:"1",stopColor:"#2856BE"})),(0,e.createElement)("clipPath",{id:"clip0_965_1932"},(0,e.createElement)("rect",{width:"32",height:"30",fill:"white"})))),edit:function(t){let{attributes:l,setAttributes:o}=t;const{ModuleBuilderModal:r,IgdShortcode:a}=window;window;const{data:s,isInit:d}=l,c=()=>{Swal.fire({html:'<div id="igd-gutenberg-module-builder" class="igd-module-builder-modal-wrap"></div>',showConfirmButton:!1,customClass:{container:"igd-module-builder-modal-container"},didOpen(t){const i=document.getElementById("igd-gutenberg-module-builder");wp.element.render((0,e.createElement)(r,{initData:s,onUpdate:e=>{o({data:e,isInit:!1}),Swal.close()},onClose:()=>Swal.close()}),i)},willClose(e){const t=document.getElementById("igd-gutenberg-module-builder");ReactDOM.unmountComponentAtNode(t)}})};return(0,e.createElement)("div",(0,n.useBlockProps)(),(0,e.createElement)(n.InspectorControls,null,(0,e.createElement)(i.PanelBody,{title:"Settings",icon:"dashicons-shortcode",initialOpen:!0},(0,e.createElement)(i.PanelRow,null,(0,e.createElement)("button",{type:"button",className:"igd-btn btn-primary",onClick:c},(0,e.createElement)("i",{className:"dashicons dashicons-admin-generic"}),(0,e.createElement)("span",null,wp.i18n.__("Configure Module","integrate-google-drive")))))),(0,e.createElement)(n.BlockControls,null,(0,e.createElement)(i.ToolbarGroup,null,(0,e.createElement)(i.ToolbarButton,{icon:"admin-generic",label:wp.i18n.__("Configure","integrate-google-drive"),text:wp.i18n.__("Configure","integrate-google-drive"),showTooltip:!0,onClick:c}))),d?(0,e.createElement)("div",{className:"module-builder-placeholder"},(0,e.createElement)("img",{src:`${igd.pluginUrl}/assets/images/shortcode-builder/types/view.svg`}),(0,e.createElement)("h3",null,wp.i18n.__("Insert View Links","integrate-google-drive")),(0,e.createElement)("p",null,wp.i18n.__("Please configure the module first to display the content.","integrate-google-drive")),(0,e.createElement)("button",{type:"button",className:"igd-btn btn-primary",onClick:c},(0,e.createElement)("i",{className:"dashicons dashicons-admin-generic"}),(0,e.createElement)("span",null,wp.i18n.__("Configure","integrate-google-drive")))):(0,e.createElement)(a,{data:s,isPreview:!0}))}})}();