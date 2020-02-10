//Add admin functions
const adminform = document.querySelector('.admin-actions');
adminform.addEventListener('submit', (e) =>{
    e.preventDefault();
    const adminemail = document.querySelector('#admin-email').value;
    const addAdminRole = functions.httpsCallable('addAdminRole');
    addAdminRole({email : adminemail}).then(result =>{
        console.log(result);
        console.log('Successful creation of admin!');   
    });
});


// Auth Changes tracking
auth.onAuthStateChanged(user => {
    // console.log(user);
    if(user){
        user.getIdTokenResult().then(idTokenResult =>{
            user.admin = idTokenResult.claims.admin;
            setupmenu(user);
        })
        console.log('User logged in: ', user);
        // get Data
        db.collection('requests').onSnapshot(snapshot => {
        //console.log(snapshot.docs);
        setupGuides(snapshot.docs,user);
        }, function(error){
            console.log(error.message);
        });
    } 
    else{
        setupmenu();
        console.log('User logged out.');
        setupGuides([],user);
    }
});

//enter and display data (guides)
const createform = document.querySelector('#create-form');
createform.addEventListener('submit', (e) => {
    e.preventDefault();

    db.collection('requests').add({
        roll : createform['roll'].value,
        contact: createform['contact'].value,
        // userid : auth.user.email,

        Sdate : createform['stseldd'].value,
        SMonth: createform['stselmm'].value,
        SYear : createform['stselyy'].value,
        SHours : createform['stselhh'].value,
        SMin: createform['stselmin'].value,

        Edate : createform['enseldd'].value,
        EMonth: createform['enselmm'].value,
        EYear : createform['enselyy'].value,
        EHours : createform['enselhh'].value,
        EMin: createform['enselmin'].value,
        status: 'Not Approved'

    }).then(() =>{
        // Close the create Guide modal and reset guide form
        const modal = document.querySelector('#modal-create');
        M.Modal.getInstance(modal).close();
        createform.reset();
    }).catch(err => {
        console.log(err.message);
    });
});


// //Show approved requests 
// // logout
// const approved = document.querySelector('#appr-req');
// approved.addEventListener('click', (e) => {
//     // e.preventDefault();
//     setupGuides
// });



// approving button use
// const approvebutt = document.querySelector(doc)

// signup
const signupForm = document.querySelector('#signup-form');
signupForm.addEventListener('submit', (e) =>{
    e.preventDefault();

    // get  user info
    const email = signupForm['signup-email'].value;
    const password = signupForm['signup-password'].value;

    // console.log(email,password);

    // signing up the user
    auth.createUserWithEmailAndPassword(email,password).then(cred => {
        // console.log(cred.user);
        // close the signup modal and reset form
        const modal = document.querySelector('#modal-signup');
        M.Modal.getInstance(modal).close();
        signupForm.reset();
    });
});

// logout
const logout = document.querySelector('#logout');
logout.addEventListener('click', (e) => {
    e.preventDefault();
    auth.signOut().then(() =>{
        console.log('User logged out.');
    });
});


// login
const loginForm = document.querySelector('#login-form');
loginForm.addEventListener('submit', (e) =>{
    e.preventDefault();

    // get  user info
    const email = loginForm['login-email'].value; 
    const password = loginForm['login-password'].value;

    auth.signInWithEmailAndPassword(email,password).then(cred => {
        // console.log('User logged in successfully!');
        // console.log(cred.user);

        //closing the login Modal
        const modal = document.querySelector('#modal-login');
        M.Modal.getInstance(modal).close();
        loginForm.reset();
    });
});









