import{u,j as f,o as a,c as _,w as s,a as i,b as e,H as p,g as h,m as g,d as o,n as y,L as b,e as v,f as n}from"./app.ce1cb888.js";import{_ as k,a as x}from"./Guest.893a156b.js";import"./ApplicationLogo.381defec.js";import"./_plugin-vue_export-helper.cdc0426e.js";const w=o("div",{class:"mb-4 text-sm text-gray-600"}," Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. ",-1),V={key:0,class:"mb-4 font-medium text-sm text-green-600"},B=["onSubmit"],E={class:"mt-4 flex items-center justify-between"},L=n(" Resend Verification Email "),N=n("Log Out"),$={__name:"VerifyEmail",props:{status:String},setup(r){const c=r,t=u(),d=()=>{t.post(route("verification.send"))},l=f(()=>c.status==="verification-link-sent");return(m,S)=>(a(),_(k,null,{default:s(()=>[i(e(p),{title:"Email Verification"}),w,e(l)?(a(),h("div",V," A new verification link has been sent to the email address you provided during registration. ")):g("",!0),o("form",{onSubmit:v(d,["prevent"])},[o("div",E,[i(x,{class:y({"opacity-25":e(t).processing}),disabled:e(t).processing},{default:s(()=>[L]),_:1},8,["class","disabled"]),i(e(b),{href:m.route("logout"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900"},{default:s(()=>[N]),_:1},8,["href"])])],40,B)]),_:1}))}};export{$ as default};
