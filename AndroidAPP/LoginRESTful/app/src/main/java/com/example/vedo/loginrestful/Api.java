package com.example.vedo.loginrestful;

public class Api {

    // Path to the Api when i tested the APP
    private static final String ROOT_URL = "http://192.168.1.108/gep/ImageBook/api/v1/Api.php?apicall=";

    public static final String URL_SIGNUP = ROOT_URL + "signup";
    public static final String URL_LOGIN = ROOT_URL + "login";

    // String global variable used to store the username
    public static String username = new String();

}
