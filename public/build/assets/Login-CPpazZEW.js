import{T as k,r as y,l as E,o as n,f as r,b as s,m as f,w as _,u as l,d as S,h as c,e as u,v as p,p as b,t as g,i as m,q as v,S as x}from"./app-CEJBUcgw.js";var P={BASE_URL:"/",DEV:!1,MODE:"production",PROD:!0,SSR:!1,VITE_APP_NAME:"Laravel"};const V={class:"d-flex flex-column flex-root"},C={class:"d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed",style:{"background-image":"url(admin-assets/media/illustrations/sigma-1/14.png)"}},A={class:"d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20"},L=["src"],N={class:"w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto"},T={class:"text-center mb-10"},D=s("h1",{class:"text-dark mb-3"}," Sign In to Admin ",-1),B={class:"text-gray-400 fw-semibold fs-4"},I={class:"fv-row mb-10"},M=s("label",{class:"form-label fs-6 fw-bold text-dark"},"Email",-1),R={key:0,class:"text-danger"},U={class:"fv-row mb-10"},z=s("div",{class:"d-flex flex-stack mb-2"},[s("label",{class:"form-label fw-bold text-dark fs-6 mb-0"}," Password ")],-1),O={key:0,class:"text-danger"},q={class:"text-center"},F={type:"submit",id:"kt_sign_in_submit",class:"btn btn-lg btn-primary w-100 mb-5"},H=s("span",{class:"indicator-label"}," Continue ",-1),Y={key:0,class:"indicator-progress"},$=s("span",{class:"spinner-border spinner-border-sm align-middle ms-2"},null,-1),j=s("div",{class:"d-flex flex-center flex-column-auto p-10"},null,-1),K={__name:"Login",setup(G){const h=P.VITE_APP_URL||"/",t=k({email:"",password:""}),e=y({email:"",password:""}),i=E(!1);async function w(){i.value=!0;for(const o in e)e[o]="";t.post("/login",{onSuccess:()=>{i.value=!1,x.fire({icon:"success",title:"Login Successful",text:"You are now logged in!"}).then(o=>{o.isConfirmed&&(t.reset(),t.clearErrors())})},onError:o=>{i.value=!1;for(const a in o)e[a]=o[a][0];o.email&&o.email[0]==="The provided credentials are incorrect."&&x.fire({icon:"error",title:"Invalid Credentials",text:"Email or password not valid. Please check and try again."})},onFinish:()=>{i.value=!1}})}return(o,a)=>(n(),r("div",V,[s("div",C,[s("div",A,[f(l(v),{href:"/",class:"mb-12"},{default:_(()=>[s("img",{alt:"Logo",src:`${l(h)}admin-assets/media/logos/logo-dark.png`,class:"h-80px"},null,8,L)]),_:1}),s("div",N,[s("form",{onSubmit:S(w,["prevent"]),class:"form w-100",novalidate:"novalidate",id:"kt_sign_in_form"},[s("div",T,[D,s("div",B,[c(" New Here? "),f(l(v),{href:"/register",class:"link-primary fw-bold"},{default:_(()=>[c("Create an Account")]),_:1})])]),s("div",I,[M,u(s("input",{"onUpdate:modelValue":a[0]||(a[0]=d=>l(t).email=d),class:b(["form-control form-control-lg form-control-solid",{"is-invalid":e.email}]),type:"email",name:"email",autocomplete:"off"},null,2),[[p,l(t).email]]),e.email?(n(),r("div",R,g(e.email),1)):m("",!0)]),s("div",U,[z,u(s("input",{"onUpdate:modelValue":a[1]||(a[1]=d=>l(t).password=d),class:b(["form-control form-control-lg form-control-solid",{"is-invalid":e.password}]),type:"password",name:"password",autocomplete:"off"},null,2),[[p,l(t).password]]),e.password?(n(),r("div",O,g(e.password),1)):m("",!0)]),s("div",q,[s("button",F,[H,i.value?(n(),r("span",Y,[c(" Please wait... "),$])):m("",!0)])])],32)])]),j])]))}};export{K as default};
