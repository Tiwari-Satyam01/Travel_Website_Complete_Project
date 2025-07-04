document.addEventListener('DOMContentLoaded',()=>{
  document.querySelectorAll('.needs-validation').forEach(form=>{
    form.addEventListener('submit',e=>{
      if(!form.checkValidity()){ e.preventDefault(); alert('Please fill required fields'); }
    });
  });
  const btn=document.createElement('button');
  btn.text='↑'; Object.assign(btn.style,{position:'fixed',bottom:'20px',right:'20px',display:'none'});
  document.body.append(btn);
  window.addEventListener('scroll',()=>btn.style.display=window.scrollY>300?'block':'none');
  btn.addEventListener('click',()=>window.scrollTo({top:0, behavior:'smooth'}));
});
