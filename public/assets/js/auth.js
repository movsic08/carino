var isAdmin = true;

if (isAdmin) {
  document.querySelector('.breadcrumb-title').textContent = "Admin Profile";
} else {
  document.querySelector('.breadcrumb-title').textContent = "User Profile";
}
