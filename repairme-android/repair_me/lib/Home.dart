import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:persistent_bottom_nav_bar/persistent-tab-view.dart';
import 'package:repairme/Maps_Control.dart';

class HomePage extends StatefulWidget{
  const HomePage({Key key, this.animationController}) : super(key: key);

  final AnimationController animationController;
  @override
  _HomePage createState() => _HomePage();
}

class _HomePage extends State<HomePage> {

  @override
  Widget build(BuildContext context) {
    // TODO: implement build
    return Column(
      children: <Widget>[
        Container(
          height: 230.0,
          margin: EdgeInsets.only(bottom: 5.0),
          decoration: new BoxDecoration(
            image: DecorationImage(
              image: new AssetImage("assets/img/5e37b4a4bcaf4.jpeg"),
              fit: BoxFit.fill,
            ),
          ),
          child: Align(
            alignment: Alignment.bottomCenter,
            child: OutlineButton(
              shape: RoundedRectangleBorder(
                borderRadius: BorderRadius.circular(18.0),
                side: BorderSide(
                  color: Colors.black,
                ),
              ),
              child: Text(
                "Perbaiki Sekarang",
                style: TextStyle(
                  color: Colors.white,
                ),
              ),
              onPressed: () =>
              {
                Navigator.pushReplacement(
                    context,
                    MaterialPageRoute(
                        builder: (context) => MapsControl())),
//                  _GoToMaps(),
              },
//                  () {
//                Navigator.push(
//                  context,
//                  MaterialPageRoute(builder: (context) => GoToMaps()),
//                );
//              },
              splashColor: Colors.black26,
              color: Colors.greenAccent,
            ),
          ),
        ),
      ],
    );
  }
}