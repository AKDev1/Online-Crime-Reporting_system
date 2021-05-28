import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_app/event.dart';
import 'event.dart';

class Login extends StatelessWidget {
  var _email,_pswd;
  TextEditingController emailCon = TextEditingController() ;
  TextEditingController pswdCon = TextEditingController() ;
  @override
  Widget build(BuildContext context){
    return Scaffold(
      appBar: AppBar(title: Text("Login"),centerTitle: true,),
      body: Center(
        child: Container (
          // height: 400.0,
          //width: 1000.0,
          child: Column (
              children: [
                Container(
                  height: 100.0,
                  //width: 1000.0
                  child:Image(
                    image: NetworkImage ('https://media.gettyimages.com/vectors/indian-flag-brush-stroke-vector-id1156597702?k=6&m=1156597702&s=612x612&w=0&h=R5vCrD_8Z6l2_bNYOB9YZbO44wRhYctVfB4ESBQTBXs='),
                  ),
                ),
                SizedBox(height:40),
                //  SizedBox(height:20),
                TextField(
                    keyboardType: TextInputType.emailAddress,
                  controller: emailCon,
                  decoration: InputDecoration(
                      hintText: "Enter Email",
                      labelText: "Email",
                      labelStyle: TextStyle(fontSize: 17, color: Colors.black),
                      border: InputBorder.none,
                      fillColor: Colors.black12,
                      filled: true),
                  obscureText: false,
                  maxLength: 30,
                ),
                TextField(
                  controller: pswdCon,
                  decoration: InputDecoration(
                      hintText: "Enter Password",
                      labelText: "Password",
                      labelStyle: TextStyle(fontSize: 17, color: Colors.black),
                      border: InputBorder.none,
                      fillColor: Colors.black12,
                      filled: true),
                  obscureText: true,
                  maxLength: 15,
                ),
                Container(
                  //height: 20.0,
                  //width: 1000.0,
                  child: RaisedButton(
                    onPressed: (){
                      _email = emailCon.text;
                      _pswd = pswdCon.text;

                      Navigator.push(context,
                        MaterialPageRoute(builder: (context)=>Event()),);
                    } ,
                    shape: RoundedRectangleBorder(
                        borderRadius: new BorderRadius.circular(30.0)),
                    child: Text("Login",
                      style: TextStyle(
                          fontWeight: FontWeight.bold,  fontSize: 20),),
                  ),
                ),
                // SizedBox(height:70),
                // Container(
                //   child: Text("Welcome to Crime Reporting App",style: TextStyle(
                //       fontWeight: FontWeight.bold, color: Colors.lightBlue,  fontSize: 25),),
                // ),

              ]
          ),

        ),
      ),
    );
  }
}