var l=Object.defineProperty;var a=Object.getOwnPropertySymbols;var o=Object.prototype.hasOwnProperty,y=Object.prototype.propertyIsEnumerable;var s=(t,e,r)=>e in t?l(t,e,{enumerable:!0,configurable:!0,writable:!0,value:r}):t[e]=r,i=(t,e)=>{for(var r in e||(e={}))o.call(e,r)&&s(t,r,e[r]);if(a)for(var r of a(e))y.call(e,r)&&s(t,r,e[r]);return t};import{cs as p,aB as u,y as g,S as L}from"./index-3da848c6.js";import{u as S}from"./chartEditStore-87bc983c.js";var T=(t=>(t.SINGLE="single",t.DOUBLE="double",t))(T||{}),c=(t=>(t.THUMBNAIL="thumbnail",t.TEXT="text",t))(c||{}),n=(t=>(t.LAYERS="layers",t.CHARTS="charts",t.DETAILS="details",t.Chart_TYPE="chartType",t.LAYER_TYPE="layerType",t))(n||{});const A=S(),{GO_CHART_LAYOUT_STORE:h}=L,d=p(h),R=u({id:"useChartLayoutStore",state:()=>i({layers:!0,charts:!0,details:!1,chartType:T.SINGLE,layerType:c.THUMBNAIL},d),getters:{getLayers(){return this.layers},getCharts(){return this.charts},getDetails(){return this.details},getChartType(){return this.chartType},getLayerType(){return this.layerType}},actions:{setItem(t,e){this.$patch(r=>{r[t]=e}),g(h,this.$state),setTimeout(()=>{A.computedScale()},500)}}});export{n as C,c as L,T as a,R as u};