import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'login.dart';
import 'registration1.dart';
//homepage

void main() {
  runApp(MaterialApp(
    home : MyApp(),
  ));
}



class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child: Container (
          // height: 400.0,
          //width: 1000.0,
          child: Column (
              children: [
                Container(
                  height: 400.0,
                  //width: 1000.0
                  child:Image(
                    image: NetworkImage ('https://media.gettyimages.com/vectors/indian-flag-brush-stroke-vector-id1156597702?k=6&m=1156597702&s=612x612&w=0&h=R5vCrD_8Z6l2_bNYOB9YZbO44wRhYctVfB4ESBQTBXs='),
                  ),
                ),
                Container(
                  //height: 40.0,
                  width: 1000.0,
                  child: RaisedButton(
                    onPressed: (){
                      Navigator.push(context,
                        MaterialPageRoute(builder: (context)=>Registration1()),);
                    } ,
                    shape: RoundedRectangleBorder(
                        borderRadius: new BorderRadius.circular(30.0)),
                    child: Text("Register (New User)",
                      style: TextStyle(
                          fontWeight: FontWeight.bold,  fontSize: 20),),
                  ),
                ),
                SizedBox(height:20),
                Container(
                  //height: 20.0,
                  width: 1000.0,
                  child: RaisedButton(
                    onPressed: (){
                      Navigator.push(context,
                      MaterialPageRoute(builder: (context)=>Login()),);
                    } ,
                    shape: RoundedRectangleBorder(
                        borderRadius: new BorderRadius.circular(30.0)),
                    child: Text("Login (Returning User)",
                      style: TextStyle(
                          fontWeight: FontWeight.bold,  fontSize: 20),),
                  ),
                ),
                SizedBox(height:70),
                Container(
                  child: Text("Welcome to Crime Reporting App",style: TextStyle(
                      fontWeight: FontWeight.bold, color: Colors.lightBlue,  fontSize: 25),),
                ),

              ]
          ),

        ),
      ),
    );
  }
}