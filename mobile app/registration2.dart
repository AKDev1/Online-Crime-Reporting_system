import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'event.dart';

class Registration2 extends StatelessWidget {
  var _pswd , _confirmpswd;
  TextEditingController pswdCon = TextEditingController();
  TextEditingController confirm_pswdCon = TextEditingController();
  @override
  Widget build(BuildContext context){
    return Scaffold(
      appBar: AppBar(title: Text("Registration"),centerTitle: true,),
      body: Center(
        child: Container (
          // height: 400.0,
          //width: 1000.0,
          child: Column (
              children: [
                // Container(
                //   height: 80.0,
                //   //width: 1000.0
                //   child:Image(
                //     image: NetworkImage ('https://media.gettyimages.com/vectors/indian-flag-brush-stroke-vector-id1156597702?k=6&m=1156597702&s=612x612&w=0&h=R5vCrD_8Z6l2_bNYOB9YZbO44wRhYctVfB4ESBQTBXs='),
                //   ),
                // ),
                SizedBox(height:40),
                // TextField(
                //   decoration: InputDecoration(
                //       hintText: "Your Name",
                //       labelText: "Name",
                //       labelStyle: TextStyle(fontSize: 15, color: Colors.black),
                //       border: InputBorder.none,
                //       fillColor: Colors.black12,
                //       filled: true),
                //   obscureText: false,
                //   maxLength: 20,
                // ),
                //  SizedBox(height:20),
                // TextField(
                //   decoration: InputDecoration(
                //       hintText: "Enter Email",
                //       labelText: "Email",
                //       labelStyle: TextStyle(fontSize: 15, color: Colors.black),
                //       border: InputBorder.none,
                //       fillColor: Colors.black12,
                //       filled: true),
                //   obscureText: false,
                //   maxLength: 30,
                // ),
                // TextField(
                //   decoration: InputDecoration(
                //       hintText: "Enter Phone Number",
                //       labelText: "Phone Number",
                //       labelStyle: TextStyle(fontSize: 15, color: Colors.black),
                //       border: InputBorder.none,
                //       fillColor: Colors.black12,
                //       filled: true),
                //   obscureText: false,
                //   maxLength: 10,
                // ),
                // Container(
                //   //height: 20.0,
                //   //width: 1000.0,
                //   child: RaisedButton(
                //     onPressed: (){
                //       Navigator.push(context,
                //         MaterialPageRoute(builder: (context)=>Registration1()),);
                //     } ,
                //     shape: RoundedRectangleBorder(
                //         borderRadius: new BorderRadius.circular(30.0)),
                //     child: Text("Next",
                //       style: TextStyle(
                //           fontWeight: FontWeight.bold,  fontSize: 20),),
                //   ),
                // ),
                TextField(
                  controller: pswdCon,
                  decoration: InputDecoration(
                      hintText: "Enter Password",
                      labelText: "Password",
                      labelStyle: TextStyle(fontSize: 15, color: Colors.black),
                      border: InputBorder.none,
                      fillColor: Colors.black12,
                      filled: true),
                  obscureText: true,
                  maxLength: 15,
                ),
                TextField(
                  controller: confirm_pswdCon,
                  decoration: InputDecoration(
                      hintText: "Enter Password",
                      labelText: "Confirm Password",
                      labelStyle: TextStyle(fontSize: 15, color: Colors.black),
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

                      _pswd = pswdCon.text;
                      _confirmpswd = confirm_pswdCon.text;


                      Navigator.push(context,
                        MaterialPageRoute(builder: (context)=>Event()),);
                    } ,
                    shape: RoundedRectangleBorder(
                        borderRadius: new BorderRadius.circular(30.0)),
                    child: Text("Submit",
                      style: TextStyle(
                          fontWeight: FontWeight.bold,  fontSize: 20),),
                  ),
                ),

              ]
          ),

        ),
      ),
    );
  }
}