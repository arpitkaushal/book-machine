// Guide List setting up
const guideList = document.querySelector('.guides');
const loggedoutlinks = document.querySelectorAll('.logged-out');
const loggedinlinks = document.querySelectorAll('.logged-in');
const adminlinks = document.querySelectorAll('.admin');
const accountdetails = document.querySelector('.account-details');

const setupmenu = (user) => {
  if (user) {
    if(user.admin){
      adminlinks.forEach(item => item.style.display ='block');
    }
    // toggle logged in links
    db.collection('users').doc(user.uid).get().then(doc => {
      const html = `
      <div>Logged in as ${user.email}</div>
      <div class = "pink-text">${user.admin ? 'Admin' :'Not an Admin'}</div>
      `
      accountdetails.innerHTML = html;
    });
    loggedinlinks.forEach(item => item.style.display = 'block');
    loggedoutlinks.forEach(item => item.style.display = 'none');
  }
  else {
    accountdetails.innerHTML = `You're not logged in madafacka.`
    accountdetails.innerHTML = '';
    // toggle logged in links
    adminlinks.forEach(item => item.style.display = 'none');
    loggedinlinks.forEach(item => item.style.display = 'none');
    loggedoutlinks.forEach(item => item.style.display = 'block');
  } 
}

const setupGuides = (data,user) => {
  
  if(data.length){

    let html = '';
    data.forEach(doc =>{
    const guide = doc.data();
    // console.log(guide);
    if(user.admin){
      const li =`
      <li>
        <div class="collapsible-header grey lighten-4">${guide.roll} has booked the laser cutter from ${guide.Sdate}/${guide.SMonth}/${guide.SYear}. ${guide.status}</div>
        <div class="collapsible-body white">${user.admin ? `
        <button id="${doc.id}" class="btn yellow darken-2 z-depth-0" name="approve" onclick="hi('${doc.id}')">Approve</button>
        `:'Your are not admin.'}</div>
      </li>
      `;
      html+=li;
      guideList.innerHTML = html;
    }else{
      const li =`
      <li>
        <div class="collapsible-header grey lighten-4">${guide.roll} has booked the laser cutter from ${guide.Sdate}/${guide.SMonth}/${guide.SYear}. Status: ${guide.status} </div>
        <div class="collapsible-body white"></div>

      </li>
      `;
      html+=li;
      guideList.innerHTML = html;

    }
  })
  }
  else{
    guideList.innerHTML = '<h5>Please log in to view data!</h5>';
  }
}

// setup materialize components
document.addEventListener('DOMContentLoaded', function() {

  var modals = document.querySelectorAll('.modal');
  M.Modal.init(modals);

  var items = document.querySelectorAll('.collapsible');
  M.Collapsible.init(items);

});


// ${user.admin ? `<button name="approve" onclick="do()">Approve</button>`:'Your are not admin'}
{/* <div class = "pink-text">${user.admin ? 'simple':'notsimple'}</div> */}