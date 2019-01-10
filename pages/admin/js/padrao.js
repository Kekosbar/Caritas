function logout(){
    document.cookie = "logincaritas=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
    window.open("/./Caritas/");
}