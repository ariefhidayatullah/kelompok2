import 'package:flutter/material.dart';

import 'main.dart';
//void main() => runApp(MyApp());
//
//class MyApp extends StatelessWidget {
//  @override
//  Widget build(BuildContext context) {
//    return new MaterialApp(
//      home: new BottomAppBarDemo(),
//    );
//  }
//}
//
class BottomAppBarDemo extends StatefulWidget{
  const BottomAppBarDemo();

  State createState() => _DemoButtonAppBar();
}

class _DemoButtonAppBar extends State<BottomAppBarDemo> {

  @override
  Widget build(BuildContext context) {
    return new Scaffold(
      floatingActionButtonLocation:
      FloatingActionButtonLocation.centerDocked,
      floatingActionButton: FloatingActionButton(
        child: const Icon(Icons.add), onPressed: () {},),
      bottomNavigationBar: BottomAppBar(
        shape: CircularNotchedRectangle(),
        notchMargin: 4.0,
        child: new Row(
          mainAxisSize: MainAxisSize.max,
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          children: <Widget>[
            IconButton(icon: Icon(Icons.menu), onPressed: () {},),
            IconButton(icon: Icon(Icons.search), onPressed: () {},),
          ],
        ),
      ),
    );
  }

}

