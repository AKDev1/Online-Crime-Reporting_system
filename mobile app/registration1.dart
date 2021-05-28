import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'registration2.dart';

class Registration1 extends StatelessWidget {
  var _name, _email, _mob_no;

  final nameCon = new TextEditingController();
  final emailCon = new TextEditingController();
  final mobCon = new TextEditingController();


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
                TextField(
                  controller: nameCon,
                    keyboardType: TextInputType.text,
                  decoration: InputDecoration(
                      hintText: "Your Name",
                      labelText: "Name",
                      labelStyle: TextStyle(fontSize: 15, color: Colors.black),
                      border: InputBorder.none,
                      fillColor: Colors.black12,
                      filled: true),
                  obscureText: false,
                  maxLength: 20,
                ),
                //  SizedBox(height:20),
                TextField(
                  controller: emailCon,
                  keyboardType: TextInputType.emailAddress,
                  decoration: InputDecoration(
                      hintText: "Enter Email",
                      labelText: "Email",
                      labelStyle: TextStyle(fontSize: 15, color: Colors.black),
                      border: InputBorder.none,
                      fillColor: Colors.black12,
                      filled: true),
                  obscureText: false,
                  maxLength: 30,
                ),
                TextField(
                  controller: mobCon,
                    keyboardType: TextInputType.number,
                  decoration: InputDecoration(
                      hintText: "Enter Phone Number",
                      labelText: "Phone Number",
                      labelStyle: TextStyle(fontSize: 15, color: Colors.black),
                      border: InputBorder.none,
                      fillColor: Colors.black12,
                      filled: true),
                  obscureText: false,
                  maxLength: 10,
                ),
                Container(
                  //height: 20.0,
                  //width: 1000.0,
                  child: RaisedButton(
                    onPressed: (){
                      _name = nameCon.text;
                      _email = emailCon.text;
                      _mob_no = mobCon.text;

                     print(_name + _email + _mob_no);
                      Navigator.push(context,
                        MaterialPageRoute(builder: (context)=>Registration2()),);
                    } ,
                    shape: RoundedRectangleBorder(
                        borderRadius: new BorderRadius.circular(30.0)),
                    child: Text("Next",
                      style: TextStyle(
                          fontWeight: FontWeight.bold,  fontSize: 20),),
                  ),
                ),
                // TextField(
                //   decoration: InputDecoration(
                //       hintText: "Enter Password",
                //       labelText: "Password",
                //       labelStyle: TextStyle(fontSize: 15, color: Colors.black),
                //       border: InputBorder.none,
                //       fillColor: Colors.black12,
                //       filled: true),
                //   obscureText: true,
                //   maxLength: 15,
                // ),
                // TextField(
                //   decoration: InputDecoration(
                //       hintText: "Enter Password",
                //       labelText: "Confirm Password",
                //       labelStyle: TextStyle(fontSize: 15, color: Colors.black),
                //       border: InputBorder.none,
                //       fillColor: Colors.black12,
                //       filled: true),
                //   obscureText: true,
                //   maxLength: 15,
                // ),
                // Container(
                //   //height: 20.0,
                //   //width: 1000.0,
                //   child: RaisedButton(
                //     onPressed: (){} ,
                //     shape: RoundedRectangleBorder(
                //         borderRadius: new BorderRadius.circular(30.0)),
                //     child: Text("Submit",
                //       style: TextStyle(
                //           fontWeight: FontWeight.bold,  fontSize: 20),),
                //   ),
                // ),
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