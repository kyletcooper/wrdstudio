/*! For license information please see dist.js.LICENSE.txt */
(()=>{var t={819:()=>{(()=>{const t=document.querySelectorAll("[data-bookmark]");document.querySelectorAll("[data-share]").forEach((t=>{t.addEventListener("click",(()=>{url=new URL(location.origin+location.path),url.searchParams.set("utm_source","social"),url.searchParams.set("utm_medium","share"),url.searchParams.set("utm_campaign","share_button"),navigator.share({url:url.href,text:document.title})}))})),t.forEach((t=>{t.addEventListener("click",(()=>{if(window.sidebar&&window.sidebar.addPanel)window.sidebar.addPanel(document.title,window.location.href,"");else if(window.external&&"AddFavorite"in window.external)window.external.AddFavorite(location.href,document.title);else{if(window.opera&&window.print||window.sidebar&&!(window.sidebar instanceof Node))return!0;alert("You can add this page to your bookmarks by pressing "+(-1!=navigator.userAgent.toLowerCase().indexOf("mac")?"Command/Cd":"CTRL")+" + D on your keyboard.")}return!1}))}))})()},729:()=>{(()=>{const t=document.querySelector("[data-darkmode]"),e=()=>{"light"===window.wrd.theme.get()?t.innerHTML='<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><rect fill="none" height="24" width="24"/><path d="M12,3c-4.97,0-9,4.03-9,9s4.03,9,9,9s9-4.03,9-9c0-0.46-0.04-0.92-0.1-1.36c-0.98,1.37-2.58,2.26-4.4,2.26 c-2.98,0-5.4-2.42-5.4-5.4c0-1.81,0.89-3.42,2.26-4.4C12.92,3.04,12.46,3,12,3L12,3z"/></svg>':t.innerHTML='<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><rect fill="none" height="24" width="24"/><path d="M12,7c-2.76,0-5,2.24-5,5s2.24,5,5,5s5-2.24,5-5S14.76,7,12,7L12,7z M2,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0 c-0.55,0-1,0.45-1,1S1.45,13,2,13z M20,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0c-0.55,0-1,0.45-1,1S19.45,13,20,13z M11,2v2 c0,0.55,0.45,1,1,1s1-0.45,1-1V2c0-0.55-0.45-1-1-1S11,1.45,11,2z M11,20v2c0,0.55,0.45,1,1,1s1-0.45,1-1v-2c0-0.55-0.45-1-1-1 C11.45,19,11,19.45,11,20z M5.99,4.58c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41l1.06,1.06 c0.39,0.39,1.03,0.39,1.41,0s0.39-1.03,0-1.41L5.99,4.58z M18.36,16.95c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41 l1.06,1.06c0.39,0.39,1.03,0.39,1.41,0c0.39-0.39,0.39-1.03,0-1.41L18.36,16.95z M19.42,5.99c0.39-0.39,0.39-1.03,0-1.41 c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L19.42,5.99z M7.05,18.36 c0.39-0.39,0.39-1.03,0-1.41c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L7.05,18.36z"/></svg>'};t.addEventListener("click",(()=>{window.wrd.theme.toggle()})),window.addEventListener("theme-change",e),e()})()},816:()=>{(()=>{const t=document.querySelector("[data-search-dialog]"),e=document.querySelector("[data-search-dialog-input]"),s=document.querySelector("[data-search-dialog-results]"),i=document.querySelectorAll("[data-search]");var r=null,o=null;const n=()=>'\n\t\t\t<li class="py-5 px-8">\n\t\t\t\t<div class="h-5 w-2/5 mb-2 bg-gray-100 dark:bg-gray-800 rounded-md animate-pulse"></div>\n\t\t\t\t<div class="h-7 w-4/5 bg-gray-100 dark:bg-gray-800 rounded-md animate-pulse"></div>\n\t\t\t</li>\n\t\t';e.addEventListener("input",(()=>{((t,e=250)=>{clearTimeout(o),o=setTimeout(t,e)})((()=>{(async t=>{let e=[];if(s.innerHTML=[1,2,3,4].map(n).join(""),r?.abort(),t.length){url=new URL("wrd/v1/search",wrd_consts.rest_url),url.searchParams.set("search",t);try{r=new AbortController;const t=await fetch(url.href,{signal:r.signal}),s=await t.json();if(!t.ok)throw s.message;e=s}catch(t){console.error(t)}}s.innerHTML=e.map((t=>`<li><a class="block py-5 px-8 hover:bg-theme-50 hover:text-theme-500 dark:hover:bg-theme-900 focus:outline-none focus:bg-theme-50 focus:text-theme-500 dark:focus:bg-theme-900" href="${t.link}">${t.preview.small}</a></li>`)).join("")})(e.value)}))})),t.addEventListener("click",(e=>{e.target===t&&t.close()})),i.forEach((e=>{e.addEventListener("click",(e=>(t.showModal(),e.preventDefault(),!1)))}))})()}},e={};function s(i){var r=e[i];if(void 0!==r)return r.exports;var o=e[i]={exports:{}};return t[i](o,o.exports,s),o.exports}(()=>{"use strict";s(729);const t=window,e=t.ShadowRoot&&(void 0===t.ShadyCSS||t.ShadyCSS.nativeShadow)&&"adoptedStyleSheets"in Document.prototype&&"replace"in CSSStyleSheet.prototype,i=Symbol(),r=new WeakMap;class o{constructor(t,e,s){if(this._$cssResult$=!0,s!==i)throw Error("CSSResult is not constructable. Use `unsafeCSS` or `css` instead.");this.cssText=t,this.t=e}get styleSheet(){let t=this.o;const s=this.t;if(e&&void 0===t){const e=void 0!==s&&1===s.length;e&&(t=r.get(s)),void 0===t&&((this.o=t=new CSSStyleSheet).replaceSync(this.cssText),e&&r.set(s,t))}return t}toString(){return this.cssText}}const n=e?t=>t:t=>t instanceof CSSStyleSheet?(t=>{let e="";for(const s of t.cssRules)e+=s.cssText;return(t=>new o("string"==typeof t?t:t+"",void 0,i))(e)})(t):t;var a;const l=window,h=l.trustedTypes,d=h?h.emptyScript:"",c=l.reactiveElementPolyfillSupport,u={toAttribute(t,e){switch(e){case Boolean:t=t?d:null;break;case Object:case Array:t=null==t?t:JSON.stringify(t)}return t},fromAttribute(t,e){let s=t;switch(e){case Boolean:s=null!==t;break;case Number:s=null===t?null:Number(t);break;case Object:case Array:try{s=JSON.parse(t)}catch(t){s=null}}return s}},p=(t,e)=>e!==t&&(e==e||t==t),v={attribute:!0,type:String,converter:u,reflect:!1,hasChanged:p};class g extends HTMLElement{constructor(){super(),this._$Ei=new Map,this.isUpdatePending=!1,this.hasUpdated=!1,this._$El=null,this.u()}static addInitializer(t){var e;this.finalize(),(null!==(e=this.h)&&void 0!==e?e:this.h=[]).push(t)}static get observedAttributes(){this.finalize();const t=[];return this.elementProperties.forEach(((e,s)=>{const i=this._$Ep(s,e);void 0!==i&&(this._$Ev.set(i,s),t.push(i))})),t}static createProperty(t,e=v){if(e.state&&(e.attribute=!1),this.finalize(),this.elementProperties.set(t,e),!e.noAccessor&&!this.prototype.hasOwnProperty(t)){const s="symbol"==typeof t?Symbol():"__"+t,i=this.getPropertyDescriptor(t,s,e);void 0!==i&&Object.defineProperty(this.prototype,t,i)}}static getPropertyDescriptor(t,e,s){return{get(){return this[e]},set(i){const r=this[t];this[e]=i,this.requestUpdate(t,r,s)},configurable:!0,enumerable:!0}}static getPropertyOptions(t){return this.elementProperties.get(t)||v}static finalize(){if(this.hasOwnProperty("finalized"))return!1;this.finalized=!0;const t=Object.getPrototypeOf(this);if(t.finalize(),void 0!==t.h&&(this.h=[...t.h]),this.elementProperties=new Map(t.elementProperties),this._$Ev=new Map,this.hasOwnProperty("properties")){const t=this.properties,e=[...Object.getOwnPropertyNames(t),...Object.getOwnPropertySymbols(t)];for(const s of e)this.createProperty(s,t[s])}return this.elementStyles=this.finalizeStyles(this.styles),!0}static finalizeStyles(t){const e=[];if(Array.isArray(t)){const s=new Set(t.flat(1/0).reverse());for(const t of s)e.unshift(n(t))}else void 0!==t&&e.push(n(t));return e}static _$Ep(t,e){const s=e.attribute;return!1===s?void 0:"string"==typeof s?s:"string"==typeof t?t.toLowerCase():void 0}u(){var t;this._$E_=new Promise((t=>this.enableUpdating=t)),this._$AL=new Map,this._$Eg(),this.requestUpdate(),null===(t=this.constructor.h)||void 0===t||t.forEach((t=>t(this)))}addController(t){var e,s;(null!==(e=this._$ES)&&void 0!==e?e:this._$ES=[]).push(t),void 0!==this.renderRoot&&this.isConnected&&(null===(s=t.hostConnected)||void 0===s||s.call(t))}removeController(t){var e;null===(e=this._$ES)||void 0===e||e.splice(this._$ES.indexOf(t)>>>0,1)}_$Eg(){this.constructor.elementProperties.forEach(((t,e)=>{this.hasOwnProperty(e)&&(this._$Ei.set(e,this[e]),delete this[e])}))}createRenderRoot(){var s;const i=null!==(s=this.shadowRoot)&&void 0!==s?s:this.attachShadow(this.constructor.shadowRootOptions);return((s,i)=>{e?s.adoptedStyleSheets=i.map((t=>t instanceof CSSStyleSheet?t:t.styleSheet)):i.forEach((e=>{const i=document.createElement("style"),r=t.litNonce;void 0!==r&&i.setAttribute("nonce",r),i.textContent=e.cssText,s.appendChild(i)}))})(i,this.constructor.elementStyles),i}connectedCallback(){var t;void 0===this.renderRoot&&(this.renderRoot=this.createRenderRoot()),this.enableUpdating(!0),null===(t=this._$ES)||void 0===t||t.forEach((t=>{var e;return null===(e=t.hostConnected)||void 0===e?void 0:e.call(t)}))}enableUpdating(t){}disconnectedCallback(){var t;null===(t=this._$ES)||void 0===t||t.forEach((t=>{var e;return null===(e=t.hostDisconnected)||void 0===e?void 0:e.call(t)}))}attributeChangedCallback(t,e,s){this._$AK(t,s)}_$EO(t,e,s=v){var i;const r=this.constructor._$Ep(t,s);if(void 0!==r&&!0===s.reflect){const o=(void 0!==(null===(i=s.converter)||void 0===i?void 0:i.toAttribute)?s.converter:u).toAttribute(e,s.type);this._$El=t,null==o?this.removeAttribute(r):this.setAttribute(r,o),this._$El=null}}_$AK(t,e){var s;const i=this.constructor,r=i._$Ev.get(t);if(void 0!==r&&this._$El!==r){const t=i.getPropertyOptions(r),o="function"==typeof t.converter?{fromAttribute:t.converter}:void 0!==(null===(s=t.converter)||void 0===s?void 0:s.fromAttribute)?t.converter:u;this._$El=r,this[r]=o.fromAttribute(e,t.type),this._$El=null}}requestUpdate(t,e,s){let i=!0;void 0!==t&&(((s=s||this.constructor.getPropertyOptions(t)).hasChanged||p)(this[t],e)?(this._$AL.has(t)||this._$AL.set(t,e),!0===s.reflect&&this._$El!==t&&(void 0===this._$EC&&(this._$EC=new Map),this._$EC.set(t,s))):i=!1),!this.isUpdatePending&&i&&(this._$E_=this._$Ej())}async _$Ej(){this.isUpdatePending=!0;try{await this._$E_}catch(t){Promise.reject(t)}const t=this.scheduleUpdate();return null!=t&&await t,!this.isUpdatePending}scheduleUpdate(){return this.performUpdate()}performUpdate(){var t;if(!this.isUpdatePending)return;this.hasUpdated,this._$Ei&&(this._$Ei.forEach(((t,e)=>this[e]=t)),this._$Ei=void 0);let e=!1;const s=this._$AL;try{e=this.shouldUpdate(s),e?(this.willUpdate(s),null===(t=this._$ES)||void 0===t||t.forEach((t=>{var e;return null===(e=t.hostUpdate)||void 0===e?void 0:e.call(t)})),this.update(s)):this._$Ek()}catch(t){throw e=!1,this._$Ek(),t}e&&this._$AE(s)}willUpdate(t){}_$AE(t){var e;null===(e=this._$ES)||void 0===e||e.forEach((t=>{var e;return null===(e=t.hostUpdated)||void 0===e?void 0:e.call(t)})),this.hasUpdated||(this.hasUpdated=!0,this.firstUpdated(t)),this.updated(t)}_$Ek(){this._$AL=new Map,this.isUpdatePending=!1}get updateComplete(){return this.getUpdateComplete()}getUpdateComplete(){return this._$E_}shouldUpdate(t){return!0}update(t){void 0!==this._$EC&&(this._$EC.forEach(((t,e)=>this._$EO(e,this[e],t))),this._$EC=void 0),this._$Ek()}updated(t){}firstUpdated(t){}}var m;g.finalized=!0,g.elementProperties=new Map,g.elementStyles=[],g.shadowRootOptions={mode:"open"},null==c||c({ReactiveElement:g}),(null!==(a=l.reactiveElementVersions)&&void 0!==a?a:l.reactiveElementVersions=[]).push("1.6.1");const $=window,_=$.trustedTypes,y=_?_.createPolicy("lit-html",{createHTML:t=>t}):void 0,f=`lit$${(Math.random()+"").slice(9)}$`,b="?"+f,A=`<${b}>`,w=document,E=(t="")=>w.createComment(t),S=t=>null===t||"object"!=typeof t&&"function"!=typeof t,x=Array.isArray,C=/<(?:(!--|\/[^a-zA-Z])|(\/?[a-zA-Z][^>\s]*)|(\/?$))/g,P=/-->/g,k=/>/g,U=RegExp(">|[ \t\n\f\r](?:([^\\s\"'>=/]+)([ \t\n\f\r]*=[ \t\n\f\r]*(?:[^ \t\n\f\r\"'`<>=]|(\"|')|))|$)","g"),T=/'/g,N=/"/g,M=/^(?:script|style|textarea|title)$/i,O=t=>(e,...s)=>({_$litType$:t,strings:e,values:s}),H=O(1),L=(O(2),Symbol.for("lit-noChange")),R=Symbol.for("lit-nothing"),z=new WeakMap,j=w.createTreeWalker(w,129,null,!1),B=(t,e)=>{const s=t.length-1,i=[];let r,o=2===e?"<svg>":"",n=C;for(let e=0;e<s;e++){const s=t[e];let a,l,h=-1,d=0;for(;d<s.length&&(n.lastIndex=d,l=n.exec(s),null!==l);)d=n.lastIndex,n===C?"!--"===l[1]?n=P:void 0!==l[1]?n=k:void 0!==l[2]?(M.test(l[2])&&(r=RegExp("</"+l[2],"g")),n=U):void 0!==l[3]&&(n=U):n===U?">"===l[0]?(n=null!=r?r:C,h=-1):void 0===l[1]?h=-2:(h=n.lastIndex-l[2].length,a=l[1],n=void 0===l[3]?U:'"'===l[3]?N:T):n===N||n===T?n=U:n===P||n===k?n=C:(n=U,r=void 0);const c=n===U&&t[e+1].startsWith("/>")?" ":"";o+=n===C?s+A:h>=0?(i.push(a),s.slice(0,h)+"$lit$"+s.slice(h)+f+c):s+f+(-2===h?(i.push(void 0),e):c)}const a=o+(t[s]||"<?>")+(2===e?"</svg>":"");if(!Array.isArray(t)||!t.hasOwnProperty("raw"))throw Error("invalid template strings array");return[void 0!==y?y.createHTML(a):a,i]};class D{constructor({strings:t,_$litType$:e},s){let i;this.parts=[];let r=0,o=0;const n=t.length-1,a=this.parts,[l,h]=B(t,e);if(this.el=D.createElement(l,s),j.currentNode=this.el.content,2===e){const t=this.el.content,e=t.firstChild;e.remove(),t.append(...e.childNodes)}for(;null!==(i=j.nextNode())&&a.length<n;){if(1===i.nodeType){if(i.hasAttributes()){const t=[];for(const e of i.getAttributeNames())if(e.endsWith("$lit$")||e.startsWith(f)){const s=h[o++];if(t.push(e),void 0!==s){const t=i.getAttribute(s.toLowerCase()+"$lit$").split(f),e=/([.?@])?(.*)/.exec(s);a.push({type:1,index:r,name:e[2],strings:t,ctor:"."===e[1]?F:"?"===e[1]?K:"@"===e[1]?Z:W})}else a.push({type:6,index:r})}for(const e of t)i.removeAttribute(e)}if(M.test(i.tagName)){const t=i.textContent.split(f),e=t.length-1;if(e>0){i.textContent=_?_.emptyScript:"";for(let s=0;s<e;s++)i.append(t[s],E()),j.nextNode(),a.push({type:2,index:++r});i.append(t[e],E())}}}else if(8===i.nodeType)if(i.data===b)a.push({type:2,index:r});else{let t=-1;for(;-1!==(t=i.data.indexOf(f,t+1));)a.push({type:7,index:r}),t+=f.length-1}r++}}static createElement(t,e){const s=w.createElement("template");return s.innerHTML=t,s}}function q(t,e,s=t,i){var r,o,n,a;if(e===L)return e;let l=void 0!==i?null===(r=s._$Co)||void 0===r?void 0:r[i]:s._$Cl;const h=S(e)?void 0:e._$litDirective$;return(null==l?void 0:l.constructor)!==h&&(null===(o=null==l?void 0:l._$AO)||void 0===o||o.call(l,!1),void 0===h?l=void 0:(l=new h(t),l._$AT(t,s,i)),void 0!==i?(null!==(n=(a=s)._$Co)&&void 0!==n?n:a._$Co=[])[i]=l:s._$Cl=l),void 0!==l&&(e=q(t,l._$AS(t,e.values),l,i)),e}class I{constructor(t,e){this.u=[],this._$AN=void 0,this._$AD=t,this._$AM=e}get parentNode(){return this._$AM.parentNode}get _$AU(){return this._$AM._$AU}v(t){var e;const{el:{content:s},parts:i}=this._$AD,r=(null!==(e=null==t?void 0:t.creationScope)&&void 0!==e?e:w).importNode(s,!0);j.currentNode=r;let o=j.nextNode(),n=0,a=0,l=i[0];for(;void 0!==l;){if(n===l.index){let e;2===l.type?e=new V(o,o.nextSibling,this,t):1===l.type?e=new l.ctor(o,l.name,l.strings,this,t):6===l.type&&(e=new Y(o,this,t)),this.u.push(e),l=i[++a]}n!==(null==l?void 0:l.index)&&(o=j.nextNode(),n++)}return r}p(t){let e=0;for(const s of this.u)void 0!==s&&(void 0!==s.strings?(s._$AI(t,s,e),e+=s.strings.length-2):s._$AI(t[e])),e++}}class V{constructor(t,e,s,i){var r;this.type=2,this._$AH=R,this._$AN=void 0,this._$AA=t,this._$AB=e,this._$AM=s,this.options=i,this._$Cm=null===(r=null==i?void 0:i.isConnected)||void 0===r||r}get _$AU(){var t,e;return null!==(e=null===(t=this._$AM)||void 0===t?void 0:t._$AU)&&void 0!==e?e:this._$Cm}get parentNode(){let t=this._$AA.parentNode;const e=this._$AM;return void 0!==e&&11===t.nodeType&&(t=e.parentNode),t}get startNode(){return this._$AA}get endNode(){return this._$AB}_$AI(t,e=this){t=q(this,t,e),S(t)?t===R||null==t||""===t?(this._$AH!==R&&this._$AR(),this._$AH=R):t!==this._$AH&&t!==L&&this.g(t):void 0!==t._$litType$?this.$(t):void 0!==t.nodeType?this.T(t):(t=>x(t)||"function"==typeof(null==t?void 0:t[Symbol.iterator]))(t)?this.k(t):this.g(t)}O(t,e=this._$AB){return this._$AA.parentNode.insertBefore(t,e)}T(t){this._$AH!==t&&(this._$AR(),this._$AH=this.O(t))}g(t){this._$AH!==R&&S(this._$AH)?this._$AA.nextSibling.data=t:this.T(w.createTextNode(t)),this._$AH=t}$(t){var e;const{values:s,_$litType$:i}=t,r="number"==typeof i?this._$AC(t):(void 0===i.el&&(i.el=D.createElement(i.h,this.options)),i);if((null===(e=this._$AH)||void 0===e?void 0:e._$AD)===r)this._$AH.p(s);else{const t=new I(r,this),e=t.v(this.options);t.p(s),this.T(e),this._$AH=t}}_$AC(t){let e=z.get(t.strings);return void 0===e&&z.set(t.strings,e=new D(t)),e}k(t){x(this._$AH)||(this._$AH=[],this._$AR());const e=this._$AH;let s,i=0;for(const r of t)i===e.length?e.push(s=new V(this.O(E()),this.O(E()),this,this.options)):s=e[i],s._$AI(r),i++;i<e.length&&(this._$AR(s&&s._$AB.nextSibling,i),e.length=i)}_$AR(t=this._$AA.nextSibling,e){var s;for(null===(s=this._$AP)||void 0===s||s.call(this,!1,!0,e);t&&t!==this._$AB;){const e=t.nextSibling;t.remove(),t=e}}setConnected(t){var e;void 0===this._$AM&&(this._$Cm=t,null===(e=this._$AP)||void 0===e||e.call(this,t))}}class W{constructor(t,e,s,i,r){this.type=1,this._$AH=R,this._$AN=void 0,this.element=t,this.name=e,this._$AM=i,this.options=r,s.length>2||""!==s[0]||""!==s[1]?(this._$AH=Array(s.length-1).fill(new String),this.strings=s):this._$AH=R}get tagName(){return this.element.tagName}get _$AU(){return this._$AM._$AU}_$AI(t,e=this,s,i){const r=this.strings;let o=!1;if(void 0===r)t=q(this,t,e,0),o=!S(t)||t!==this._$AH&&t!==L,o&&(this._$AH=t);else{const i=t;let n,a;for(t=r[0],n=0;n<r.length-1;n++)a=q(this,i[s+n],e,n),a===L&&(a=this._$AH[n]),o||(o=!S(a)||a!==this._$AH[n]),a===R?t=R:t!==R&&(t+=(null!=a?a:"")+r[n+1]),this._$AH[n]=a}o&&!i&&this.j(t)}j(t){t===R?this.element.removeAttribute(this.name):this.element.setAttribute(this.name,null!=t?t:"")}}class F extends W{constructor(){super(...arguments),this.type=3}j(t){this.element[this.name]=t===R?void 0:t}}const J=_?_.emptyScript:"";class K extends W{constructor(){super(...arguments),this.type=4}j(t){t&&t!==R?this.element.setAttribute(this.name,J):this.element.removeAttribute(this.name)}}class Z extends W{constructor(t,e,s,i,r){super(t,e,s,i,r),this.type=5}_$AI(t,e=this){var s;if((t=null!==(s=q(this,t,e,0))&&void 0!==s?s:R)===L)return;const i=this._$AH,r=t===R&&i!==R||t.capture!==i.capture||t.once!==i.once||t.passive!==i.passive,o=t!==R&&(i===R||r);r&&this.element.removeEventListener(this.name,this,i),o&&this.element.addEventListener(this.name,this,t),this._$AH=t}handleEvent(t){var e,s;"function"==typeof this._$AH?this._$AH.call(null!==(s=null===(e=this.options)||void 0===e?void 0:e.host)&&void 0!==s?s:this.element,t):this._$AH.handleEvent(t)}}class Y{constructor(t,e,s){this.element=t,this.type=6,this._$AN=void 0,this._$AM=e,this.options=s}get _$AU(){return this._$AM._$AU}_$AI(t){q(this,t)}}const G=$.litHtmlPolyfillSupport;var Q,X;null==G||G(D,V),(null!==(m=$.litHtmlVersions)&&void 0!==m?m:$.litHtmlVersions=[]).push("2.6.1");class tt extends g{constructor(){super(...arguments),this.renderOptions={host:this},this._$Do=void 0}createRenderRoot(){var t,e;const s=super.createRenderRoot();return null!==(t=(e=this.renderOptions).renderBefore)&&void 0!==t||(e.renderBefore=s.firstChild),s}update(t){const e=this.render();this.hasUpdated||(this.renderOptions.isConnected=this.isConnected),super.update(t),this._$Do=((t,e,s)=>{var i,r;const o=null!==(i=null==s?void 0:s.renderBefore)&&void 0!==i?i:e;let n=o._$litPart$;if(void 0===n){const t=null!==(r=null==s?void 0:s.renderBefore)&&void 0!==r?r:null;o._$litPart$=n=new V(e.insertBefore(E(),t),t,void 0,null!=s?s:{})}return n._$AI(t),n})(e,this.renderRoot,this.renderOptions)}connectedCallback(){var t;super.connectedCallback(),null===(t=this._$Do)||void 0===t||t.setConnected(!0)}disconnectedCallback(){var t;super.disconnectedCallback(),null===(t=this._$Do)||void 0===t||t.setConnected(!1)}render(){return L}}tt.finalized=!0,tt._$litElement$=!0,null===(Q=globalThis.litElementHydrateSupport)||void 0===Q||Q.call(globalThis,{LitElement:tt});const et=globalThis.litElementPolyfillSupport;null==et||et({LitElement:tt}),(null!==(X=globalThis.litElementVersions)&&void 0!==X?X:globalThis.litElementVersions=[]).push("3.2.2");class st{constructor(t){}get _$AU(){return this._$AM._$AU}_$AT(t,e,s){this._$Ct=t,this._$AM=e,this._$Ci=s}_$AS(t,e){return this.update(t,e)}update(t,e){return this.render(...e)}}class it extends st{constructor(t){if(super(t),this.it=R,2!==t.type)throw Error(this.constructor.directiveName+"() can only be used in child bindings")}render(t){if(t===R||null==t)return this._t=void 0,this.it=t;if(t===L)return t;if("string"!=typeof t)throw Error(this.constructor.directiveName+"() called with a non-string value");if(t===this.it)return this._t;this.it=t;const e=[t];return e.raw=e,this._t={_$litType$:this.constructor.resultType,strings:e,values:[]}}}it.directiveName="unsafeHTML",it.resultType=1;const rt=(ot=it,(...t)=>({_$litDirective$:ot,values:t}));var ot;class nt extends tt{static properties={page:{type:Number},perPage:{type:Number,attribute:"per-page"},categories:{type:Array},_cats:{type:Array,state:!0},_posts:{type:Array,state:!0},_loading:{type:Number,state:!0},_usingPostsPlaceholder:{type:Boolean,state:!0}};constructor(){super(),this.page=1,this.perPage=10,this.categories=[],this._cats=[],this._posts=[],this._usingPostsPlaceholder=!0,this._loading=0,this.postsCollection=new wp.api.collections.Posts,this.getCats(),this.style.display="flex",this.style.flexDirection="column"}createRenderRoot(){return this}firstUpdated(){this.clearPlaceholders("navigation")}clearPlaceholders(t){"posts"===t&&(this._usingPostsPlaceholder=!1),this.querySelectorAll(`[data-placeholder="${t}"]`).forEach((t=>t.remove()))}async getCats(){var t=new wp.api.collections.Categories;this._cats=await t.fetch({data:{hide_empty:!0}}),this.clearPlaceholders("filters")}toggleCategory(t){const e=this.categories.indexOf(t);-1===e?this.categories.push(t):this.categories.splice(e,1),this.requestUpdate("categories"),this.getPosts()}hasCategory(t){return-1!==this.categories.indexOf(t)}async getPosts(){this.clearPlaceholders("posts"),this._loading++;const t=await this.postsCollection.fetch({data:{page:this.page,per_page:this.perPage,categories:this.categories}});this._loading--,this._posts=t}hasOlderPosts(){return null===this.postsCollection.state.totalPages||this.page<this.postsCollection.state.totalPages}showOlderPosts(){this.hasOlderPosts()&&this.page++,this.getPosts()}hasNewerPosts(){return this.page>1}showNewerPosts(){this.hasNewerPosts()&&this.page--,this.getPosts()}render(){return H`
			${this._cats.length>0?H`
			<div class="scrollbar-subtle -order-1 flex gap-4 mb-8 overflow-x-auto">
				${this._cats.map((t=>this.renderChip(t)))}
			</div>
			`:null}
			
			<div class="grid gap-14">
				${this.renderPosts()}
			</div>
			
			<div class="flex justify-between mt-8">
				<button @click="${this.showNewerPosts}" ?disabled="${!this.hasNewerPosts()}" type="button"
					class="py-2 px-8 border-2 border-theme-500 font-medium text-theme-500 trasition-colors cursor-pointer hover:bg-theme-500 hover:text-white focus:bg-theme-500 focus:text-white disabled:border-gray-500 disabled:text-gray-500 disabled:hover:bg-transparent">
					Newer posts
				</button>
			
				<button @click="${this.showOlderPosts}" ?disabled="${!this.hasOlderPosts()}" type="button"
					class="py-2 px-8 border-2 border-theme-500 font-medium text-theme-500 trasition-colors cursor-pointer hover:bg-theme-500 hover:text-white focus:bg-theme-500 focus:text-white disabled:border-gray-500 disabled:text-gray-500 disabled:hover:bg-transparent">
					Older posts
				</button>
			</div>
		`}renderPosts(){if(!this._usingPostsPlaceholder)return 0!==this._loading?this.renderPostSkeletons():this._posts.length>0?this._posts.map((t=>rt(t.preview.default))):this.renderEmpty()}renderChip(t){return H`
			<button @click="${()=>{this.toggleCategory(t.id)}}" type="button"
				class="rounded-full py-2 px-4 text-sm whitespace-nowrap ${this.hasCategory(t.id)?"bg-theme-100 dark:bg-theme-900 text-theme-500":"bg-gray-100 dark:bg-gray-800"}">
				${t.name}
			</button>
		`}renderPostSkeletons(){return Array.from(Array(this.perPage)).map((()=>H`
			<div class="grid grid-cols-12 gap-6 md:gap-8">
				<div class="col-span-12 md:col-span-6 lg:col-span-4 min-h-[15rem] bg-gray-200 dark:bg-gray-700 animate-pulse">
				</div>
			
				<div class="col-span-12 md:col-span-6 lg:col-span-8 md:py-8">
					<div class="bg-gray-200 dark:bg-gray-700 h-7 w-4/5 animate-pulse rounded-sm mb-4"></div>
					<div class="bg-gray-200 dark:bg-gray-700 h-7 w-1/3 animate-pulse rounded-sm mb-4"></div>
			
					<div class="bg-gray-200 dark:bg-gray-700 h-4 w-4/5 animate-pulse rounded-sm mb-3"></div>
					<div class="bg-gray-200 dark:bg-gray-700 h-4 w-3/5 animate-pulse rounded-sm mb-3"></div>
					<div class="bg-gray-200 dark:bg-gray-700 h-4 w-1/3 animate-pulse rounded-sm mb-8"></div>
			
					<div class="bg-gray-200 dark:bg-gray-700 h-7 w-1/4 animate-pulse rounded-sm"></div>
				</div>
			</div>
		`))}renderEmpty(){return H`
			<div class="text-center py-16">
				<h2 class="text-xl font-semibold mb-3">
					There's nothing here!
				</h2>
			
				<p class="max-w-lg mx-auto">
					We couldn't find any posts that matched your search. Try searching for something shorter or with less filters
					applied.
				</p>
			</div>
		`}}customElements.define("post-archive",nt),s(819),s(816)})()})();