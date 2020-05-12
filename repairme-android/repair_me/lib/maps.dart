import 'package:flutter/material.dart';
import 'package:flutter_map/flutter_map.dart';
import 'package:latlong/latlong.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return new MaterialApp(
      home: new MyMapsPage(),
    );
  }
}

class MyMapsPage extends StatefulWidget {
  @override
  _MyHomePageState createState() => new _MyHomePageState();
}

class _MyHomePageState extends State<MyMapsPage> {
  @override
  Widget build(BuildContext context) {
    // TODO: implement build
    return new Scaffold(
      body: new FlutterMap(
        options: new MapOptions(
          center: new LatLng(-7.91346, 113.82145),
          minZoom: 10.0,
        ),
        layers: [
          new TileLayerOptions(
              urlTemplate: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
              subdomains: ['a', 'b', 'c']),
          new MarkerLayerOptions(
            markers: [
              new Marker(
                width: 45.0,
                height: 45.0,
                point: new LatLng(-7.913478948634584, 113.8200195532897),
                builder: (context) => new Container(
                  child: IconButton(
                    icon: Icon(Icons.location_on),
                    color: Colors.red,
                    iconSize: 45.0,
                    onPressed: () {
                      print('Indah Cell');
                      _showModalBottomSheet(context);
                    },
                  ),
                ),
              ),
            ],
          ),
        ],
      ),
    );
  }

  void _showModalBottomSheet(BuildContext context) {
    showModalBottomSheet<void>(
      context: context,
      builder: (context) {
        return _BottomSheetContent();
      },
    );
  }
}

class _BottomSheetContent extends StatelessWidget {

  @override
  Widget build(BuildContext context) {
    // TODO: implement build
    return Container(
      height: 300,
      child: Column(
        children: [
          Container(
            margin: EdgeInsets.only(bottom: 2.0),
            decoration: new BoxDecoration(
              border : Border.all(
                width: 5,
                color: Colors.white,
              ) ,
              image: DecorationImage(
                  image: new AssetImage("assets/img/5e37b4a4bcaf4.jpeg"),
                  fit: BoxFit.fill,
              ),
            ),
            height: 230,
          ),
          Container(
            padding: EdgeInsets.only(left:10.0),
            margin : EdgeInsets.all(3.0),
            child: new Row(
              children: <Widget>[
                Expanded(
                  child : new FlatButton(
                    onPressed: null,
                    highlightColor: Theme.of(context).colorScheme.onSurface.withOpacity(0.12),
                    child: Text(
                        "Indah Cell",
                        style:TextStyle(
                        color: Colors.purple,
                    ),
                    ),
                  ),
                  flex: 2,
                ),
                new RaisedButton(
                  onPressed: () {},
                  splashColor: Colors.lightGreenAccent,
                  color: Colors.greenAccent,
                  child: Text(
                      "Pilih Mitra",
                      style:TextStyle(
                      color: Colors.purple,
                  ),
                  ),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}
