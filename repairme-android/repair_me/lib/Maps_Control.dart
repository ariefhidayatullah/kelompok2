import 'package:repairme/template/bottom_nav/tab_icon.dart';
import 'package:flutter/material.dart';
import 'package:repairme/bottom_navigation.dart';
import 'package:repairme/template/bottom_nav/fintness_app_theme.dart';
import 'package:repairme/Home.dart';

import 'Home.dart';
import 'login.dart';
import 'maps.dart';

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
      home: MapsControl(),
    );
  }
}

class MapsControl extends StatefulWidget {


  @override
  _MapsControlState createState() => _MapsControlState();
}

class _MapsControlState extends State<MapsControl>
    with TickerProviderStateMixin {
  AnimationController animationController;
  List<TabIconData> tabIconsList = TabIconData.tabIconsList;

  Widget tabBody = Container(
    color: FintnessAppTheme.background,
  );





  @override
  void initState() {
    tabIconsList.forEach((TabIconData tab) {
      tab.isSelected = false;
    });
    tabIconsList[1].isSelected = true;

    animationController = AnimationController(
        duration: const Duration(milliseconds: 600), vsync: this);
    tabBody = MyMapsPage(animationController: animationController);
    super.initState();
  }

  @override
  void dispose() {
    animationController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Container(
      color: FintnessAppTheme.background,
      child: Scaffold(
        backgroundColor: Colors.transparent,
        body: FutureBuilder<bool>(
          future: getData(),
          builder: (BuildContext context, AsyncSnapshot<bool> snapshot) {
            if (!snapshot.hasData) {
              return const SizedBox();
            } else {
              return Stack(
                children: <Widget>[
                  tabBody,
                  bottomBar(),
                ],
              );
            }
          },
        ),
      ),
    );
  }

  Future<bool> getData() async {
    await Future<dynamic>.delayed(const Duration(milliseconds: 200));
    return true;
  }

  Widget bottomBar() {
    return Column(
      children: <Widget>[
        const Expanded(
          child: SizedBox(),
        ),
        BottomBarView(
          tabIconsList: tabIconsList,
          addClick: () {
            animationController.reverse().then<dynamic>((data){
              if (!mounted) {
                return;
              }
              setState(() {
                tabBody =
                      LoginOptions(animationController: animationController);
              });
            });
          },
          changeIndex: (index) {
            if (index == 0 || index == 2) {
              animationController.reverse().then<dynamic>((data) {
                if (!mounted) {
                  return;
                }
                setState(() {
                  tabBody =
                      HomePage(animationController: animationController);
                });
              });
            } else if (index == 1 || index == 3) {
              animationController.reverse().then<dynamic>((data) {
                if (!mounted) {
                  return;
                }
                setState(() {
                  tabBody =
                      MyMapsPage(animationController: animationController);
                });
              });
            }
          },
        ),
      ],
    );
  }
}
