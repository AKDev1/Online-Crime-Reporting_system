import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';

class OtherDetails extends StatelessWidget {
  var _event_details;
  TextEditingController eventCon = TextEditingController();

  @override
  Widget build(BuildContext context){
    return Scaffold(
      appBar: AppBar(title: Text("Event Details"),centerTitle: true,),
      body: Center(
        child: Container (
          // height: 400.0,
          //width: 1000.0,
          child: Column (
              children: [
                // Container(
                //   height: 180.0,
                //   //width: 1000.0
                //   child:Image(
                //     image: NetworkImage ('https://media.gettyimages.com/vectors/indian-flag-brush-stroke-vector-id1156597702?k=6&m=1156597702&s=612x612&w=0&h=R5vCrD_8Z6l2_bNYOB9YZbO44wRhYctVfB4ESBQTBXs='),
                //   ),
                // ),
                SizedBox(height:80),
                //  SizedBox(height:20),

                TextField(
                  controller: eventCon,
                  decoration: InputDecoration(
                    //hintText: "",
                      labelText: "Enter Event Details",
                      labelStyle: TextStyle(fontSize: 22, color: Colors.black),
                      border: InputBorder.none,
                      fillColor: Colors.black12,
                      filled: true),
                  obscureText: false,
                  maxLength: 150,
                ),
                SizedBox(height:80),
                //  SizedBox(height:20),
                RaisedButton(
                  onPressed: (){

                    _event_details = eventCon.text;


                    // Navigator.push(context,
                    //   MaterialPageRoute(builder: (context)=>()),);
                  } ,
                  shape: RoundedRectangleBorder(
                      borderRadius: new BorderRadius.circular(30.0)),
                  child: Text("Submit",
                    style: TextStyle(
                        fontWeight: FontWeight.bold,  fontSize: 20),),
                ),
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