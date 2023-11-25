(()=>{"use strict";var e={n:t=>{var i=t&&t.__esModule?()=>t.default:()=>t;return e.d(i,{a:i}),i},d:(t,i)=>{for(var o in i)e.o(i,o)&&!e.o(t,o)&&Object.defineProperty(t,o,{enumerable:!0,get:i[o]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t)};const t=window.wp.blocks,i=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"wplmi/site-modified-date","title":"Site Modified Date","description":"Display website\\"s last modified date.","icon":"image-rotate","keywords":["last-modified","time","date","last-updated","updated"],"category":"widgets","textdomain":"wp-last-modified-info","attributes":{"format":{"type":"string"},"display":{"type":"string","default":"block"},"textAlign":{"type":"string","default":"left"},"textBefore":{"type":"string"},"textAfter":{"type":"string"},"varFontSize":{"type":"integer","default":16,"minimum":1},"varLineHeight":{"type":"string"},"varColorBackground":{"type":"string"},"varColorBorder":{"type":"string"},"varColorText":{"type":"string"}},"supports":{"html":false},"editorScript":"file:index.js"}'),o=window.wp.element,l=window.wp.i18n,a=window.wp.serverSideRender;var n=e.n(a);const r=window.wp.components,d=window.wp.blockEditor;(0,t.registerBlockType)(i,{edit:e=>{let{attributes:t,setAttributes:i}=e;const a=[{name:(0,l.__)("Tiny","wp-last-modified-info"),slug:"small",size:10},{name:(0,l.__)("Small","wp-last-modified-info"),slug:"small",size:14},{name:(0,l.__)("Normal","wp-last-modified-info"),slug:"normal",size:16},{name:(0,l.__)("Big","wp-last-modified-info"),slug:"big",size:20}];return(0,o.createElement)("div",(0,d.useBlockProps)(),(0,o.createElement)(n(),{block:"wplmi/site-modified-date",attributes:t}),(0,o.createElement)(d.InspectorControls,{key:"settings"},(0,o.createElement)(r.PanelBody,{title:(0,l.__)("Options","wp-last-modified-info"),initialOpen:!1},(0,o.createElement)(r.TextControl,{label:(0,l.__)("Format","wp-last-modified-info"),help:(0,l.__)("Date Time format. Leave blank for default.","wp-last-modified-info"),value:t.format,onChange:e=>i({format:e})}),(0,o.createElement)(r.SelectControl,{label:(0,l.__)("Display","wp-last-modified-info"),value:t.display,options:[{label:"Block",value:"block"},{label:"Inline",value:"inline"}],onChange:e=>i({display:e})}),(0,o.createElement)(r.SelectControl,{label:(0,l.__)("Text Align","wp-last-modified-info"),value:t.textAlign,options:[{label:"Left",value:"left"},{label:"Center",value:"center"},{label:"Right",value:"right"}],onChange:e=>i({textAlign:e})})),(0,o.createElement)(r.PanelBody,{title:(0,l.__)("Content","wp-last-modified-info"),initialOpen:!1},(0,o.createElement)(r.TextControl,{label:(0,l.__)("Text Before","wp-last-modified-info"),help:(0,l.__)("Text to show before the timestamp","wp-last-modified-info"),value:t.textBefore,onChange:e=>i({textBefore:e})}),(0,o.createElement)(r.TextControl,{label:(0,l.__)("Text After","wp-last-modified-info"),help:(0,l.__)("Text to show after the timestamp","wp-last-modified-info"),value:t.textAfter,onChange:e=>i({textAfter:e})})),(0,o.createElement)(r.PanelBody,{title:(0,l.__)("Typography","wp-last-modified-info")},(0,o.createElement)(r.FontSizePicker,{label:(0,l.__)("Font Size","wp-last-modified-info"),value:t.varFontSize,onChange:e=>i({varFontSize:e}),fallBackFontSize:16,fontSizes:a}),(0,o.createElement)(d.LineHeightControl,{label:(0,l.__)("Line Height","wp-last-modified-info"),value:t.varLineHeight,onChange:e=>i({varLineHeight:e})})),(0,o.createElement)(r.PanelBody,{title:(0,l.__)("Colors","wp-last-modified-info")},(0,o.createElement)(d.ColorPaletteControl,{label:(0,l.__)("Background","wp-last-modified-info"),value:t.varColorBackground,onChange:e=>i({varColorBackground:e})}),(0,o.createElement)(d.ColorPaletteControl,{label:(0,l.__)("Text","wp-last-modified-info"),value:t.varColorText,onChange:e=>i({varColorText:e})}))))}})})();