/*! For license information please see dist.js.LICENSE.txt */
(()=>{var t={607:()=>{(()=>{document.querySelectorAll("[data-share]").forEach((t=>t.addEventListener("click",(()=>{url=new URL(location.origin+location.path),url.searchParams.set("utm_source","social"),url.searchParams.set("utm_medium","share"),url.searchParams.set("utm_campaign","share_button"),navigator.share({url:url.href,text:document.title})}))));const t=document.querySelectorAll("[data-darkmode]"),e=()=>{"light"===window.wrd.theme.get()?t.forEach((t=>t.innerHTML='<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><rect fill="none" height="24" width="24"/><path d="M12,3c-4.97,0-9,4.03-9,9s4.03,9,9,9s9-4.03,9-9c0-0.46-0.04-0.92-0.1-1.36c-0.98,1.37-2.58,2.26-4.4,2.26 c-2.98,0-5.4-2.42-5.4-5.4c0-1.81,0.89-3.42,2.26-4.4C12.92,3.04,12.46,3,12,3L12,3z"/></svg>')):t.forEach((t=>t.innerHTML='<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><rect fill="none" height="24" width="24"/><path d="M12,7c-2.76,0-5,2.24-5,5s2.24,5,5,5s5-2.24,5-5S14.76,7,12,7L12,7z M2,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0 c-0.55,0-1,0.45-1,1S1.45,13,2,13z M20,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0c-0.55,0-1,0.45-1,1S19.45,13,20,13z M11,2v2 c0,0.55,0.45,1,1,1s1-0.45,1-1V2c0-0.55-0.45-1-1-1S11,1.45,11,2z M11,20v2c0,0.55,0.45,1,1,1s1-0.45,1-1v-2c0-0.55-0.45-1-1-1 C11.45,19,11,19.45,11,20z M5.99,4.58c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41l1.06,1.06 c0.39,0.39,1.03,0.39,1.41,0s0.39-1.03,0-1.41L5.99,4.58z M18.36,16.95c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41 l1.06,1.06c0.39,0.39,1.03,0.39,1.41,0c0.39-0.39,0.39-1.03,0-1.41L18.36,16.95z M19.42,5.99c0.39-0.39,0.39-1.03,0-1.41 c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L19.42,5.99z M7.05,18.36 c0.39-0.39,0.39-1.03,0-1.41c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L7.05,18.36z"/></svg>'))};t.forEach((t=>t.addEventListener("click",(()=>{window.wrd.theme.toggle()})))),window.addEventListener("theme-change",e),e();const s=document.querySelectorAll("[data-dialog-open]"),i=document.querySelectorAll("[data-dialog-close]"),r=document.querySelectorAll("[data-dialog-clickoff]");s.forEach((t=>t.addEventListener("click",(e=>{const s=t.dataset.dialogOpen,i=document.getElementById(s);return i.inert=!1,i?.showModal(),e.preventDefault(),!1})))),i.forEach((t=>t.addEventListener("click",(e=>{const s=t.dataset.dialogClose,i=document.getElementById(s);return i.inert=!0,i?.close(),e.preventDefault(),!1})))),r.forEach((t=>{t.addEventListener("click",(e=>{e.target===t&&(t.inert=!0,t.close())})),t.addEventListener("close",(e=>t.inert=!0)),t.addEventListener("cancel",(e=>t.inert=!0))}))})()},505:()=>{(()=>{const t=document.querySelectorAll("[data-megamenu-open]"),e=()=>{document.querySelectorAll("[data-megamenu][open]").forEach((t=>{t.close(),t.inert=!0}))},s=t=>{const e=document.querySelector(`[data-megamenu="${t}"]`),s=e.offsetWidth,i=(t=>document.querySelector(`[data-megamenu-open="${t}"]`))(t),r=i.getBoundingClientRect(),o=i.offsetWidth,n=i.offsetHeight,a=document.body.clientWidth;let l=r.left+.5*o-.5*s;const h=a-(l+s+20);l=Math.max(20,l),h<0&&(l-=Math.abs(h));const d=r.left-l;let c=r.bottom+n+20;e.style.left=l+"px",e.style.top=c+"px",e.style.setProperty("--arrow-left",d+"px")},i=()=>{document.querySelectorAll("[data-megamenu]").forEach((t=>{s(t.dataset.megamenu)}))},r=t=>{const i=document.querySelector(`[data-megamenu="${t}"]`);e(),i.show(),i.inert=!1,s(t)};t.forEach((t=>{t.addEventListener("mouseenter",(()=>{r(t.dataset.megamenuOpen)})),t.addEventListener("focusin",(()=>{e()}))})),document.addEventListener("keydown",(t=>{"ArrowDown"==t.key&&document.activeElement.matches("[data-megamenu-open]")&&(r(document.activeElement.dataset.megamenuOpen),t.preventDefault())})),document.addEventListener("click",(t=>{t.target.closest("[data-megamenu]")||e()})),window.addEventListener("resize",(()=>{i()})),window.addEventListener("scroll",(()=>{e()})),i()})()}},e={};function s(i){var r=e[i];if(void 0!==r)return r.exports;var o=e[i]={exports:{}};return t[i](o,o.exports,s),o.exports}(()=>{"use strict";const t=window,e=t.ShadowRoot&&(void 0===t.ShadyCSS||t.ShadyCSS.nativeShadow)&&"adoptedStyleSheets"in Document.prototype&&"replace"in CSSStyleSheet.prototype,i=Symbol(),r=new WeakMap;class o{constructor(t,e,s){if(this._$cssResult$=!0,s!==i)throw Error("CSSResult is not constructable. Use `unsafeCSS` or `css` instead.");this.cssText=t,this.t=e}get styleSheet(){let t=this.o;const s=this.t;if(e&&void 0===t){const e=void 0!==s&&1===s.length;e&&(t=r.get(s)),void 0===t&&((this.o=t=new CSSStyleSheet).replaceSync(this.cssText),e&&r.set(s,t))}return t}toString(){return this.cssText}}const n=e?t=>t:t=>t instanceof CSSStyleSheet?(t=>{let e="";for(const s of t.cssRules)e+=s.cssText;return(t=>new o("string"==typeof t?t:t+"",void 0,i))(e)})(t):t;var a;const l=window,h=l.trustedTypes,d=h?h.emptyScript:"",c=l.reactiveElementPolyfillSupport,u={toAttribute(t,e){switch(e){case Boolean:t=t?d:null;break;case Object:case Array:t=null==t?t:JSON.stringify(t)}return t},fromAttribute(t,e){let s=t;switch(e){case Boolean:s=null!==t;break;case Number:s=null===t?null:Number(t);break;case Object:case Array:try{s=JSON.parse(t)}catch(t){s=null}}return s}},p=(t,e)=>e!==t&&(e==e||t==t),g={attribute:!0,type:String,converter:u,reflect:!1,hasChanged:p};class v extends HTMLElement{constructor(){super(),this._$Ei=new Map,this.isUpdatePending=!1,this.hasUpdated=!1,this._$El=null,this.u()}static addInitializer(t){var e;this.finalize(),(null!==(e=this.h)&&void 0!==e?e:this.h=[]).push(t)}static get observedAttributes(){this.finalize();const t=[];return this.elementProperties.forEach(((e,s)=>{const i=this._$Ep(s,e);void 0!==i&&(this._$Ev.set(i,s),t.push(i))})),t}static createProperty(t,e=g){if(e.state&&(e.attribute=!1),this.finalize(),this.elementProperties.set(t,e),!e.noAccessor&&!this.prototype.hasOwnProperty(t)){const s="symbol"==typeof t?Symbol():"__"+t,i=this.getPropertyDescriptor(t,s,e);void 0!==i&&Object.defineProperty(this.prototype,t,i)}}static getPropertyDescriptor(t,e,s){return{get(){return this[e]},set(i){const r=this[t];this[e]=i,this.requestUpdate(t,r,s)},configurable:!0,enumerable:!0}}static getPropertyOptions(t){return this.elementProperties.get(t)||g}static finalize(){if(this.hasOwnProperty("finalized"))return!1;this.finalized=!0;const t=Object.getPrototypeOf(this);if(t.finalize(),void 0!==t.h&&(this.h=[...t.h]),this.elementProperties=new Map(t.elementProperties),this._$Ev=new Map,this.hasOwnProperty("properties")){const t=this.properties,e=[...Object.getOwnPropertyNames(t),...Object.getOwnPropertySymbols(t)];for(const s of e)this.createProperty(s,t[s])}return this.elementStyles=this.finalizeStyles(this.styles),!0}static finalizeStyles(t){const e=[];if(Array.isArray(t)){const s=new Set(t.flat(1/0).reverse());for(const t of s)e.unshift(n(t))}else void 0!==t&&e.push(n(t));return e}static _$Ep(t,e){const s=e.attribute;return!1===s?void 0:"string"==typeof s?s:"string"==typeof t?t.toLowerCase():void 0}u(){var t;this._$E_=new Promise((t=>this.enableUpdating=t)),this._$AL=new Map,this._$Eg(),this.requestUpdate(),null===(t=this.constructor.h)||void 0===t||t.forEach((t=>t(this)))}addController(t){var e,s;(null!==(e=this._$ES)&&void 0!==e?e:this._$ES=[]).push(t),void 0!==this.renderRoot&&this.isConnected&&(null===(s=t.hostConnected)||void 0===s||s.call(t))}removeController(t){var e;null===(e=this._$ES)||void 0===e||e.splice(this._$ES.indexOf(t)>>>0,1)}_$Eg(){this.constructor.elementProperties.forEach(((t,e)=>{this.hasOwnProperty(e)&&(this._$Ei.set(e,this[e]),delete this[e])}))}createRenderRoot(){var s;const i=null!==(s=this.shadowRoot)&&void 0!==s?s:this.attachShadow(this.constructor.shadowRootOptions);return((s,i)=>{e?s.adoptedStyleSheets=i.map((t=>t instanceof CSSStyleSheet?t:t.styleSheet)):i.forEach((e=>{const i=document.createElement("style"),r=t.litNonce;void 0!==r&&i.setAttribute("nonce",r),i.textContent=e.cssText,s.appendChild(i)}))})(i,this.constructor.elementStyles),i}connectedCallback(){var t;void 0===this.renderRoot&&(this.renderRoot=this.createRenderRoot()),this.enableUpdating(!0),null===(t=this._$ES)||void 0===t||t.forEach((t=>{var e;return null===(e=t.hostConnected)||void 0===e?void 0:e.call(t)}))}enableUpdating(t){}disconnectedCallback(){var t;null===(t=this._$ES)||void 0===t||t.forEach((t=>{var e;return null===(e=t.hostDisconnected)||void 0===e?void 0:e.call(t)}))}attributeChangedCallback(t,e,s){this._$AK(t,s)}_$EO(t,e,s=g){var i;const r=this.constructor._$Ep(t,s);if(void 0!==r&&!0===s.reflect){const o=(void 0!==(null===(i=s.converter)||void 0===i?void 0:i.toAttribute)?s.converter:u).toAttribute(e,s.type);this._$El=t,null==o?this.removeAttribute(r):this.setAttribute(r,o),this._$El=null}}_$AK(t,e){var s;const i=this.constructor,r=i._$Ev.get(t);if(void 0!==r&&this._$El!==r){const t=i.getPropertyOptions(r),o="function"==typeof t.converter?{fromAttribute:t.converter}:void 0!==(null===(s=t.converter)||void 0===s?void 0:s.fromAttribute)?t.converter:u;this._$El=r,this[r]=o.fromAttribute(e,t.type),this._$El=null}}requestUpdate(t,e,s){let i=!0;void 0!==t&&(((s=s||this.constructor.getPropertyOptions(t)).hasChanged||p)(this[t],e)?(this._$AL.has(t)||this._$AL.set(t,e),!0===s.reflect&&this._$El!==t&&(void 0===this._$EC&&(this._$EC=new Map),this._$EC.set(t,s))):i=!1),!this.isUpdatePending&&i&&(this._$E_=this._$Ej())}async _$Ej(){this.isUpdatePending=!0;try{await this._$E_}catch(t){Promise.reject(t)}const t=this.scheduleUpdate();return null!=t&&await t,!this.isUpdatePending}scheduleUpdate(){return this.performUpdate()}performUpdate(){var t;if(!this.isUpdatePending)return;this.hasUpdated,this._$Ei&&(this._$Ei.forEach(((t,e)=>this[e]=t)),this._$Ei=void 0);let e=!1;const s=this._$AL;try{e=this.shouldUpdate(s),e?(this.willUpdate(s),null===(t=this._$ES)||void 0===t||t.forEach((t=>{var e;return null===(e=t.hostUpdate)||void 0===e?void 0:e.call(t)})),this.update(s)):this._$Ek()}catch(t){throw e=!1,this._$Ek(),t}e&&this._$AE(s)}willUpdate(t){}_$AE(t){var e;null===(e=this._$ES)||void 0===e||e.forEach((t=>{var e;return null===(e=t.hostUpdated)||void 0===e?void 0:e.call(t)})),this.hasUpdated||(this.hasUpdated=!0,this.firstUpdated(t)),this.updated(t)}_$Ek(){this._$AL=new Map,this.isUpdatePending=!1}get updateComplete(){return this.getUpdateComplete()}getUpdateComplete(){return this._$E_}shouldUpdate(t){return!0}update(t){void 0!==this._$EC&&(this._$EC.forEach(((t,e)=>this._$EO(e,this[e],t))),this._$EC=void 0),this._$Ek()}updated(t){}firstUpdated(t){}}var m;v.finalized=!0,v.elementProperties=new Map,v.elementStyles=[],v.shadowRootOptions={mode:"open"},null==c||c({ReactiveElement:v}),(null!==(a=l.reactiveElementVersions)&&void 0!==a?a:l.reactiveElementVersions=[]).push("1.6.1");const $=window,y=$.trustedTypes,f=y?y.createPolicy("lit-html",{createHTML:t=>t}):void 0,_=`lit$${(Math.random()+"").slice(9)}$`,b="?"+_,w=`<${b}>`,A=document,E=(t="")=>A.createComment(t),S=t=>null===t||"object"!=typeof t&&"function"!=typeof t,x=Array.isArray,P=/<(?:(!--|\/[^a-zA-Z])|(\/?[a-zA-Z][^>\s]*)|(\/?$))/g,C=/-->/g,k=/>/g,O=RegExp(">|[ \t\n\f\r](?:([^\\s\"'>=/]+)([ \t\n\f\r]*=[ \t\n\f\r]*(?:[^ \t\n\f\r\"'`<>=]|(\"|')|))|$)","g"),T=/'/g,U=/"/g,L=/^(?:script|style|textarea|title)$/i,M=t=>(e,...s)=>({_$litType$:t,strings:e,values:s}),H=M(1),N=(M(2),Symbol.for("lit-noChange")),R=Symbol.for("lit-nothing"),z=new WeakMap,B=A.createTreeWalker(A,129,null,!1),j=(t,e)=>{const s=t.length-1,i=[];let r,o=2===e?"<svg>":"",n=P;for(let e=0;e<s;e++){const s=t[e];let a,l,h=-1,d=0;for(;d<s.length&&(n.lastIndex=d,l=n.exec(s),null!==l);)d=n.lastIndex,n===P?"!--"===l[1]?n=C:void 0!==l[1]?n=k:void 0!==l[2]?(L.test(l[2])&&(r=RegExp("</"+l[2],"g")),n=O):void 0!==l[3]&&(n=O):n===O?">"===l[0]?(n=null!=r?r:P,h=-1):void 0===l[1]?h=-2:(h=n.lastIndex-l[2].length,a=l[1],n=void 0===l[3]?O:'"'===l[3]?U:T):n===U||n===T?n=O:n===C||n===k?n=P:(n=O,r=void 0);const c=n===O&&t[e+1].startsWith("/>")?" ":"";o+=n===P?s+w:h>=0?(i.push(a),s.slice(0,h)+"$lit$"+s.slice(h)+_+c):s+_+(-2===h?(i.push(void 0),e):c)}const a=o+(t[s]||"<?>")+(2===e?"</svg>":"");if(!Array.isArray(t)||!t.hasOwnProperty("raw"))throw Error("invalid template strings array");return[void 0!==f?f.createHTML(a):a,i]};class q{constructor({strings:t,_$litType$:e},s){let i;this.parts=[];let r=0,o=0;const n=t.length-1,a=this.parts,[l,h]=j(t,e);if(this.el=q.createElement(l,s),B.currentNode=this.el.content,2===e){const t=this.el.content,e=t.firstChild;e.remove(),t.append(...e.childNodes)}for(;null!==(i=B.nextNode())&&a.length<n;){if(1===i.nodeType){if(i.hasAttributes()){const t=[];for(const e of i.getAttributeNames())if(e.endsWith("$lit$")||e.startsWith(_)){const s=h[o++];if(t.push(e),void 0!==s){const t=i.getAttribute(s.toLowerCase()+"$lit$").split(_),e=/([.?@])?(.*)/.exec(s);a.push({type:1,index:r,name:e[2],strings:t,ctor:"."===e[1]?J:"?"===e[1]?K:"@"===e[1]?Z:V})}else a.push({type:6,index:r})}for(const e of t)i.removeAttribute(e)}if(L.test(i.tagName)){const t=i.textContent.split(_),e=t.length-1;if(e>0){i.textContent=y?y.emptyScript:"";for(let s=0;s<e;s++)i.append(t[s],E()),B.nextNode(),a.push({type:2,index:++r});i.append(t[e],E())}}}else if(8===i.nodeType)if(i.data===b)a.push({type:2,index:r});else{let t=-1;for(;-1!==(t=i.data.indexOf(_,t+1));)a.push({type:7,index:r}),t+=_.length-1}r++}}static createElement(t,e){const s=A.createElement("template");return s.innerHTML=t,s}}function D(t,e,s=t,i){var r,o,n,a;if(e===N)return e;let l=void 0!==i?null===(r=s._$Co)||void 0===r?void 0:r[i]:s._$Cl;const h=S(e)?void 0:e._$litDirective$;return(null==l?void 0:l.constructor)!==h&&(null===(o=null==l?void 0:l._$AO)||void 0===o||o.call(l,!1),void 0===h?l=void 0:(l=new h(t),l._$AT(t,s,i)),void 0!==i?(null!==(n=(a=s)._$Co)&&void 0!==n?n:a._$Co=[])[i]=l:s._$Cl=l),void 0!==l&&(e=D(t,l._$AS(t,e.values),l,i)),e}class I{constructor(t,e){this.u=[],this._$AN=void 0,this._$AD=t,this._$AM=e}get parentNode(){return this._$AM.parentNode}get _$AU(){return this._$AM._$AU}v(t){var e;const{el:{content:s},parts:i}=this._$AD,r=(null!==(e=null==t?void 0:t.creationScope)&&void 0!==e?e:A).importNode(s,!0);B.currentNode=r;let o=B.nextNode(),n=0,a=0,l=i[0];for(;void 0!==l;){if(n===l.index){let e;2===l.type?e=new W(o,o.nextSibling,this,t):1===l.type?e=new l.ctor(o,l.name,l.strings,this,t):6===l.type&&(e=new X(o,this,t)),this.u.push(e),l=i[++a]}n!==(null==l?void 0:l.index)&&(o=B.nextNode(),n++)}return r}p(t){let e=0;for(const s of this.u)void 0!==s&&(void 0!==s.strings?(s._$AI(t,s,e),e+=s.strings.length-2):s._$AI(t[e])),e++}}class W{constructor(t,e,s,i){var r;this.type=2,this._$AH=R,this._$AN=void 0,this._$AA=t,this._$AB=e,this._$AM=s,this.options=i,this._$Cm=null===(r=null==i?void 0:i.isConnected)||void 0===r||r}get _$AU(){var t,e;return null!==(e=null===(t=this._$AM)||void 0===t?void 0:t._$AU)&&void 0!==e?e:this._$Cm}get parentNode(){let t=this._$AA.parentNode;const e=this._$AM;return void 0!==e&&11===t.nodeType&&(t=e.parentNode),t}get startNode(){return this._$AA}get endNode(){return this._$AB}_$AI(t,e=this){t=D(this,t,e),S(t)?t===R||null==t||""===t?(this._$AH!==R&&this._$AR(),this._$AH=R):t!==this._$AH&&t!==N&&this.g(t):void 0!==t._$litType$?this.$(t):void 0!==t.nodeType?this.T(t):(t=>x(t)||"function"==typeof(null==t?void 0:t[Symbol.iterator]))(t)?this.k(t):this.g(t)}O(t,e=this._$AB){return this._$AA.parentNode.insertBefore(t,e)}T(t){this._$AH!==t&&(this._$AR(),this._$AH=this.O(t))}g(t){this._$AH!==R&&S(this._$AH)?this._$AA.nextSibling.data=t:this.T(A.createTextNode(t)),this._$AH=t}$(t){var e;const{values:s,_$litType$:i}=t,r="number"==typeof i?this._$AC(t):(void 0===i.el&&(i.el=q.createElement(i.h,this.options)),i);if((null===(e=this._$AH)||void 0===e?void 0:e._$AD)===r)this._$AH.p(s);else{const t=new I(r,this),e=t.v(this.options);t.p(s),this.T(e),this._$AH=t}}_$AC(t){let e=z.get(t.strings);return void 0===e&&z.set(t.strings,e=new q(t)),e}k(t){x(this._$AH)||(this._$AH=[],this._$AR());const e=this._$AH;let s,i=0;for(const r of t)i===e.length?e.push(s=new W(this.O(E()),this.O(E()),this,this.options)):s=e[i],s._$AI(r),i++;i<e.length&&(this._$AR(s&&s._$AB.nextSibling,i),e.length=i)}_$AR(t=this._$AA.nextSibling,e){var s;for(null===(s=this._$AP)||void 0===s||s.call(this,!1,!0,e);t&&t!==this._$AB;){const e=t.nextSibling;t.remove(),t=e}}setConnected(t){var e;void 0===this._$AM&&(this._$Cm=t,null===(e=this._$AP)||void 0===e||e.call(this,t))}}class V{constructor(t,e,s,i,r){this.type=1,this._$AH=R,this._$AN=void 0,this.element=t,this.name=e,this._$AM=i,this.options=r,s.length>2||""!==s[0]||""!==s[1]?(this._$AH=Array(s.length-1).fill(new String),this.strings=s):this._$AH=R}get tagName(){return this.element.tagName}get _$AU(){return this._$AM._$AU}_$AI(t,e=this,s,i){const r=this.strings;let o=!1;if(void 0===r)t=D(this,t,e,0),o=!S(t)||t!==this._$AH&&t!==N,o&&(this._$AH=t);else{const i=t;let n,a;for(t=r[0],n=0;n<r.length-1;n++)a=D(this,i[s+n],e,n),a===N&&(a=this._$AH[n]),o||(o=!S(a)||a!==this._$AH[n]),a===R?t=R:t!==R&&(t+=(null!=a?a:"")+r[n+1]),this._$AH[n]=a}o&&!i&&this.j(t)}j(t){t===R?this.element.removeAttribute(this.name):this.element.setAttribute(this.name,null!=t?t:"")}}class J extends V{constructor(){super(...arguments),this.type=3}j(t){this.element[this.name]=t===R?void 0:t}}const G=y?y.emptyScript:"";class K extends V{constructor(){super(...arguments),this.type=4}j(t){t&&t!==R?this.element.setAttribute(this.name,G):this.element.removeAttribute(this.name)}}class Z extends V{constructor(t,e,s,i,r){super(t,e,s,i,r),this.type=5}_$AI(t,e=this){var s;if((t=null!==(s=D(this,t,e,0))&&void 0!==s?s:R)===N)return;const i=this._$AH,r=t===R&&i!==R||t.capture!==i.capture||t.once!==i.once||t.passive!==i.passive,o=t!==R&&(i===R||r);r&&this.element.removeEventListener(this.name,this,i),o&&this.element.addEventListener(this.name,this,t),this._$AH=t}handleEvent(t){var e,s;"function"==typeof this._$AH?this._$AH.call(null!==(s=null===(e=this.options)||void 0===e?void 0:e.host)&&void 0!==s?s:this.element,t):this._$AH.handleEvent(t)}}class X{constructor(t,e,s){this.element=t,this.type=6,this._$AN=void 0,this._$AM=e,this.options=s}get _$AU(){return this._$AM._$AU}_$AI(t){D(this,t)}}const F=$.litHtmlPolyfillSupport;var Q,Y;null==F||F(q,W),(null!==(m=$.litHtmlVersions)&&void 0!==m?m:$.litHtmlVersions=[]).push("2.6.1");class tt extends v{constructor(){super(...arguments),this.renderOptions={host:this},this._$Do=void 0}createRenderRoot(){var t,e;const s=super.createRenderRoot();return null!==(t=(e=this.renderOptions).renderBefore)&&void 0!==t||(e.renderBefore=s.firstChild),s}update(t){const e=this.render();this.hasUpdated||(this.renderOptions.isConnected=this.isConnected),super.update(t),this._$Do=((t,e,s)=>{var i,r;const o=null!==(i=null==s?void 0:s.renderBefore)&&void 0!==i?i:e;let n=o._$litPart$;if(void 0===n){const t=null!==(r=null==s?void 0:s.renderBefore)&&void 0!==r?r:null;o._$litPart$=n=new W(e.insertBefore(E(),t),t,void 0,null!=s?s:{})}return n._$AI(t),n})(e,this.renderRoot,this.renderOptions)}connectedCallback(){var t;super.connectedCallback(),null===(t=this._$Do)||void 0===t||t.setConnected(!0)}disconnectedCallback(){var t;super.disconnectedCallback(),null===(t=this._$Do)||void 0===t||t.setConnected(!1)}render(){return N}}tt.finalized=!0,tt._$litElement$=!0,null===(Q=globalThis.litElementHydrateSupport)||void 0===Q||Q.call(globalThis,{LitElement:tt});const et=globalThis.litElementPolyfillSupport;null==et||et({LitElement:tt}),(null!==(Y=globalThis.litElementVersions)&&void 0!==Y?Y:globalThis.litElementVersions=[]).push("3.2.2");class st{constructor(t){}get _$AU(){return this._$AM._$AU}_$AT(t,e,s){this._$Ct=t,this._$AM=e,this._$Ci=s}_$AS(t,e){return this.update(t,e)}update(t,e){return this.render(...e)}}class it extends st{constructor(t){if(super(t),this.it=R,2!==t.type)throw Error(this.constructor.directiveName+"() can only be used in child bindings")}render(t){if(t===R||null==t)return this._t=void 0,this.it=t;if(t===N)return t;if("string"!=typeof t)throw Error(this.constructor.directiveName+"() called with a non-string value");if(t===this.it)return this._t;this.it=t;const e=[t];return e.raw=e,this._t={_$litType$:this.constructor.resultType,strings:e,values:[]}}}it.directiveName="unsafeHTML",it.resultType=1;const rt=(ht=it,(...t)=>({_$litDirective$:ht,values:t})),ot=document.querySelector("link[rel='https://api.w.org/']")?.href,nt=(t,e)=>{for(const s in t){const i=t[s];Array.isArray(i)?i.length>0&&e(s,i.join(",")):"object"!=typeof i?null===i||e(s,i):Object.keys(i).length>0&&e(s,JSON.stringify(i))}},at=async(t,e)=>{try{e={data:{},method:"GET",fetchOptions:{},...e};const s=new URL(ot+t),i=e.method.toUpperCase();Object.keys(e.data).length&&("GET"===i||"HEAD"===i?nt(e.data,((t,e)=>{s.searchParams.set(t,e)})):(e.fetchOptions.data={},nt(e.data,((t,s)=>{e.fetchOptions.data[t]=s}))));const r=await fetch(s.href,{...e.fetchOptions,method:i}),o=await r.json();if(!r.ok)throw o.message;return{headers:r.headers,data:o}}catch(t){console.error(t)}},lt=async(t,e)=>{try{const{data:s}=await at(t,e);return s}catch(t){console.error(t)}};var ht;window.wrd.apiRequestHeaders=at,window.wrd.apiRequest=lt;class dt extends tt{static properties={page:{type:Number},perPage:{type:Number,attribute:"per-page"},categories:{type:Array},_totalPages:{type:Number,state:!0},_cats:{type:Array,state:!0},_posts:{type:Array,state:!0},_loading:{type:Number,state:!0},_usingPostsPlaceholder:{type:Boolean,state:!0}};constructor(){super(),this.page=1,this.perPage=10,this.categories=[],this._totalPages=1,this._cats=[],this._posts=[],this._usingPostsPlaceholder=!0,this._loading=0,this.getCats(),this.style.display="flex",this.style.flexDirection="column"}async connectedCallback(){super.connectedCallback();const{headers:t}=await at("wp/v2/posts",{data:{page:this.page,per_page:this.perPage,categories:this.categories,_fields:"id"}});this._totalPages=t.get("X-WP-TotalPages"),this.requestUpdate()}createRenderRoot(){return this}firstUpdated(){this.clearPlaceholders("navigation")}clearPlaceholders(t){"posts"===t&&(this._usingPostsPlaceholder=!1),this.querySelectorAll(`[data-placeholder="${t}"]`).forEach((t=>t.remove()))}async getCats(){this._cats=await lt("wp/v2/categories",{data:{hide_empty:!0}}),this.clearPlaceholders("filters")}toggleCategory(t){const e=this.categories.indexOf(t);-1===e?this.categories.push(t):this.categories.splice(e,1),this.page=1,this.requestUpdate("categories"),this.getPosts()}hasCategory(t){return-1!==this.categories.indexOf(t)}async getPosts(){this.clearPlaceholders("posts"),this._loading++;const t=await lt("wp/v2/posts",{data:{page:this.page,per_page:this.perPage,categories:this.categories}});this._loading--,this._posts=t}scrollToTop(){window.scrollTo({behavior:"smooth",top:this.getBoundingClientRect().top-document.body.getBoundingClientRect().top-50})}updatePageURL(){this.scrollToTop();let t=window.location.href.split("/page/")[0];t+=t.endsWith("/")?"":"/",history.replaceState({},"",t+`page/${this.page}/`)}hasOlderPosts(){return this.page<this._totalPages}showOlderPosts(){this.hasOlderPosts()&&(this.page++,this.updatePageURL()),this.getPosts()}hasNewerPosts(){return this.page>1}showNewerPosts(){this.hasNewerPosts()&&(this.page--,this.updatePageURL()),this.getPosts()}render(){return H`
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
			
					<svg class="md:hidden" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
						fill="currentColor">
						<path d="M0 0h24v24H0z" fill="none" />
						<path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" />
					</svg>
			
					<span class="hidden md:block">Newer posts</span>
				</button>
			
				<button @click="${this.showOlderPosts}" ?disabled="${!this.hasOlderPosts()}" type="button"
					class="py-2 px-8 border-2 border-theme-500 font-medium text-theme-500 trasition-colors cursor-pointer hover:bg-theme-500 hover:text-white focus:bg-theme-500 focus:text-white disabled:border-gray-500 disabled:text-gray-500 disabled:hover:bg-transparent">
			
					<svg class="md:hidden" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
						fill="currentColor">
						<path d="M0 0h24v24H0z" fill="none" />
						<path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" />
					</svg>
			
					<span class="hidden md:block">Older posts</span>
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
		`}}customElements.define("post-archive",dt),(()=>{const t=document.querySelector("[data-search-dialog-input]"),e=document.querySelector("[data-search-dialog-results]");var s=null,i=null;const r=()=>'\n\t\t\t<li class="py-5 px-8">\n\t\t\t\t<div class="h-5 w-2/5 mb-2 bg-gray-100 dark:bg-gray-800 rounded-md animate-pulse"></div>\n\t\t\t\t<div class="h-7 w-4/5 bg-gray-100 dark:bg-gray-800 rounded-md animate-pulse"></div>\n\t\t\t</li>\n\t\t';t.addEventListener("input",(()=>{((t,e=250)=>{clearTimeout(i),i=setTimeout(t,e)})((()=>{(async t=>{let i=[];e.innerHTML=[1,2,3,4].map(r).join(""),s?.abort(),t.length&&(s=new AbortController,i=await lt("wrd/v1/search",{data:{search:t},fetchOptions:{signal:s.signal}})||[]),e.innerHTML=i.map((t=>`<li><a class="block py-5 px-8 hover:bg-theme-50 hover:text-theme-500 dark:hover:bg-theme-900 focus:outline-none focus:bg-theme-50 focus:text-theme-500 dark:focus:bg-theme-900" href="${t.link}">${t.preview.small}</a></li>`)).join("")})(t.value)}))}))})(),s(607),s(505)})()})();