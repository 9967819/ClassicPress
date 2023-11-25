(()=>{"use strict";const e=window.wp.element,t=window.wp.plugins,o=window.wp.i18n,i=window.wp.data,n=window.wp.editPost,l=window.wp.date,d=window.wp.components,s=()=>{const t=(0,l.__experimentalGetSettings)(),s=t.formats.date+" "+t.formats.time,{editedModified:a,currentModified:r,postStatus:u,postMeta:c}=(0,i.useSelect)((e=>({editedModified:e("core/editor").getEditedPostAttribute("modified"),currentModified:e("core/editor").getCurrentPostAttribute("modified"),postStatus:e("core/editor").getEditedPostAttribute("status"),postMeta:e("core/editor").getEditedPostAttribute("meta")}))),{editPost:m}=(0,i.useDispatch)("core/editor");return["auto-draft","future"].includes(u)?null:(0,e.createElement)(n.PluginPostStatusInfo,null,"yes"==(null==c?void 0:c._lmt_disableupdate)?(0,e.createElement)(e.Fragment,null,(0,e.createElement)("span",null,(0,o.__)("Last Modified","wp-last-modified-info")),(0,e.createElement)("b",null,(0,l.dateI18n)(s,a))):(0,e.createElement)(e.Fragment,null,(0,e.createElement)("span",null,(0,o.__)("Modified","wp-last-modified-info")),(0,e.createElement)(d.Dropdown,{position:"bottom left",contentClassName:"edit-post-post-schedule__dialog",renderToggle:t=>{let{onToggle:o,isOpen:i}=t;return(0,e.createElement)(d.Button,{className:"edit-post-post-schedule__toggle",onClick:o,"aria-expanded":i,isTertiary:!0},(0,l.dateI18n)(s,a))},renderContent:()=>{return(0,e.createElement)(d.DateTimePicker,{currentDate:a,onChange:e=>{m({modified:e})},is12Hour:(o=t.formats.time,/(?:^|[^\\])[aAgh]/.test(o))});var o}})))},a=()=>{const{postStatus:t,postMeta:l}=(0,i.useSelect)((e=>({postStatus:e("core/editor").getEditedPostAttribute("status"),postMeta:e("core/editor").getEditedPostAttribute("meta")}))),{editPost:s}=(0,i.useDispatch)("core/editor");return["auto-draft","future"].includes(t)?null:(0,e.createElement)(n.PluginPostStatusInfo,null,(0,e.createElement)("span",null,(0,o.__)("Lock Modified Date","wp-last-modified-info")),(0,e.createElement)(d.FormToggle,{checked:"yes"==(null==l?void 0:l._lmt_disableupdate),onChange:()=>s({meta:{_lmt_disableupdate:"yes"==(null==l?void 0:l._lmt_disableupdate)?"no":"yes"}})}))},r=()=>{const{postStatus:t,postType:l,postMeta:s}=(0,i.useSelect)((e=>({postStatus:e("core/editor").getEditedPostAttribute("status"),postType:e("core/editor").getCurrentPostType(),postMeta:e("core/editor").getEditedPostAttribute("meta")}))),{editPost:a}=(0,i.useDispatch)("core/editor");return["auto-draft","future"].includes(t)?null:wplmiBlockEditor.postTypes.includes(l)&&wplmiBlockEditor.isEnabled?(0,e.createElement)(n.PluginDocumentSettingPanel,{name:"modified-info",title:(0,o.__)("Modified Info","wp-last-modified-info"),className:"wplmi-panel",icon:null},(0,e.createElement)(d.PanelRow,null,(0,e.createElement)(d.CheckboxControl,{label:(0,o.__)("Hide Modified Info on Frontend","wp-last-modified-info"),checked:"yes"==(null==s?void 0:s._lmt_disable),onChange:()=>a({meta:{_lmt_disable:"yes"==(null==s?void 0:s._lmt_disable)?"no":"yes"}})}))):null};(0,t.registerPlugin)("wp-last-modified-info",{render:()=>(0,e.createElement)(e.Fragment,null,(0,e.createElement)(s,null),(0,e.createElement)(a,null),(0,e.createElement)(r,null)),icon:null})})();