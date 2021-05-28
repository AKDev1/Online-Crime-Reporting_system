import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'details.dart';
import 'otherdetails.dart';

class Event extends StatelessWidget {

  @override
  Widget build(BuildContext context){

    return Scaffold(
      appBar: AppBar(title: Text("Select Event Type"),centerTitle: true,),
      body: Center(
        child: Container (
          // height: 400.0,
          //width: 1000.0,
          child: Column (
              children: [
                Container(
                  height: 180.0,
                  //width: 1000.0
                  child:Image(
                    image: NetworkImage ('https://media.gettyimages.com/vectors/indian-flag-brush-stroke-vector-id1156597702?k=6&m=1156597702&s=612x612&w=0&h=R5vCrD_8Z6l2_bNYOB9YZbO44wRhYctVfB4ESBQTBXs='),
                  ),
                ),
                SizedBox(height:80),
                //  SizedBox(height:20),

                Container(
                  height: 40.0,
                  width: 1000.0,
                  child: RaisedButton(
                    onPressed: (){
                      Navigator.push(context,
                        MaterialPageRoute(builder: (context)=>Details()),);
                    } ,
                    shape: RoundedRectangleBorder(
                        borderRadius: new BorderRadius.circular(30.0)),
                    child: Text("Car Crash",
                      style: TextStyle(
                          fontWeight: FontWeight.bold,  fontSize: 20),),
                  ),
                ),
                SizedBox(height:40),
                //  SizedBox(height:20),
                Container(
                  height: 40.0,
                  width: 1000.0,
                  child: RaisedButton(
                    onPressed: (){
                      Navigator.push(context,
                        MaterialPageRoute(builder: (context)=>Details()),);
                    } ,
                    shape: RoundedRectangleBorder(
                        borderRadius: new BorderRadius.circular(30.0)),
                    child: Text("Fire",
                      style: TextStyle(
                          fontWeight: FontWeight.bold,  fontSize: 20),),
                  ),
                ),
                SizedBox(height:40),
                //  SizedBox(height:20),
                Container(
                  height: 40.0,
                  width: 1000.0,
                  child: RaisedButton(
                    onPressed: (){
                      Navigator.push(context,
                        MaterialPageRoute(builder: (context)=>OtherDetails()),);
                    } ,
                    shape: RoundedRectangleBorder(
                        borderRadius: new BorderRadius.circular(30.0)),
                    child: Text("Other Crime",
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