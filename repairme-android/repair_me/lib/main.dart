import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:persistent_bottom_nav_bar/models/persistent-nav-bar-scaffold.widget.dart';
import 'package:persistent_bottom_nav_bar/persistent-tab-view.dart';
import 'package:repairme/maps.dart';


void main() => runApp(MyApp());

class MyApp extends StatelessWidget{
  final _title = "Repair Me";
  @override
    Widget build(BuildContext context) {
    // TODO: implement build
    return MaterialApp(
      title: _title,
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: MyHomePage(),
    );
  }
}

class MyHomePage extends StatefulWidget{
  @override
  _MyHomePageState createState() => _MyHomePageState();
}
class GoToMaps extends StatefulWidget{
  @override
  _GoToMaps createState() => _GoToMaps();
}

class _MyHomePageState extends State<MyHomePage>{
  int currentTab = 0;
  PageOne one;
  MyMapsPage maps;
  List<Widget> pages;
  Widget currentPage;

  void initState(){
    one = PageOne();
    maps = MyMapsPage();

    pages = [one, maps];
    currentPage = one;
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    // TODO: implement build
    return Scaffold(
      appBar: AppBar(
        title: Text("Repair Me"),
      ),
      body: currentPage,
      bottomNavigationBar: BottomNavigationBar(
        currentIndex: currentTab,
        onTap: (int index){
                  setState(() {
                    currentTab = index;
                    currentPage = pages[index];
                  });
              },
        items: <BottomNavigationBarItem>[
          BottomNavigationBarItem(
            icon: Icon(Icons.home),
            title: Text("Home"),
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.add),
            title: Text("Repair Now"),
          )
        ],
      ),
    );
  }

}

class PageOne extends StatelessWidget {
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
                  style:TextStyle(
                  color: Colors.white,
                  ),
                ),
              onPressed: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => GoToMaps()),
                );
              },
              splashColor: Colors.black26,
              color: Colors.greenAccent,
            ),
          ),
        ),
      ],
    );

  }

}

class _GoToMaps extends State<GoToMaps> {

  int currentTab = 1;
  PageOne one;
  MyMapsPage maps;
  List<Widget> pages;
  Widget currentPage;

  void initState() {
    one = PageOne();
    maps = MyMapsPage();

    pages = [one, maps];
    currentPage = one;
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    // TODO: implement build
    return new Scaffold(
      appBar: AppBar(
        title: Text("Repair Now"),
      ),
      body: MyMapsPage(),
      bottomNavigationBar: BottomNavigationBar(
        currentIndex: currentTab,
        onTap: (int index) {
          setState(() {
            currentTab = index;
            currentPage = pages[index];
          });
        },
        items: <BottomNavigationBarItem>[
          BottomNavigationBarItem(
            icon: Icon(Icons.home),
            title: Text("Home"),
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.add),
            title: Text("Repair Now"),
          )
        ],
      ),
    );
  }
}