import * as React from 'react';
import { StyleSheet, Text, View, Alert, Linking, Dimensions } from 'react-native';
import baseUrl from '../../config/config'

export default class MapsScreen extends React.Component {
  render(){
    return (
      <CustomTiles />
    );
  }
}

import MapView, {
  MAP_TYPES,
  PROVIDER_DEFAULT,
  ProviderPropType,
  UrlTile,
  Marker,
} from 'react-native-maps';

const { width, height } = Dimensions.get('window');

const ASPECT_RATIO = width / height;
const LATITUDE = -7.91346;
const LONGITUDE = 113.82145;
const LATITUDE_DELTA = 0.0722;
const LONGITUDE_DELTA = LATITUDE_DELTA * ASPECT_RATIO;

class CustomTiles extends React.Component {
  constructor(props, context) {
    super(props, context);

    this.state = {
      Mitra: [],
      region: {
        latitude: LATITUDE,
        longitude: LONGITUDE,
        latitudeDelta: LATITUDE_DELTA,
        longitudeDelta: LONGITUDE_DELTA,
      },
    };
  }

  componentDidMount() {
    baseUrl.get('/api/mitra')
  .then((response) => {
      const Mitra = response.data;
      this.setState ({ Mitra });
      console.log(Mitra);
      
  })
  .catch((error) => {
      console.log(error);
  });
  }

  get mapType() {
    // MapKit does not support 'none' as a base map
    return this.props.provider === PROVIDER_DEFAULT
      ? MAP_TYPES.STANDARD
      : MAP_TYPES.NONE;
  }

  render() {
    const { Mitra } = this.state;
    const { region } = this.state;
    const MitraData = Mitra.length ? (
      Mitra.map(Mitras  => { 
        const latitude = Mitras.lat.toString();
        const longitude = Mitras.lng.toString();
        return (
          <View style={styles.container}>
            <MapView
              provider={this.props.provider}
              mapType={this.mapType}
              style={styles.map}
              initialRegion={region}
            >
              <UrlTile
                urlTemplate="http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                zIndex={-1}
              />
            </MapView>
            {/* <View style={styles.buttonContainer}>
              <View style={styles.bubble}>
                <Text>Custom Tiles</Text>
              </View>
            </View> */}
          </View>
        );
      })
    ) : (
      <View style={styles.container}>
        <MapView
          provider={this.props.provider}
          mapType={this.mapType}
          style={styles.map}
          initialRegion={region}
        >
          <UrlTile
            urlTemplate="http://c.tile.openstreetmap.org/{z}/{x}/{y}.png"
            zIndex={-1}
          />
        </MapView>
        {/* <View style={styles.buttonContainer}>
          <View style={styles.bubble}>
            <Text>Custom Tiles</Text>
          </View>
        </View> */}
      </View>
    )
    return(
      <View style={styles.container}>
        <MapView
          provider={this.props.provider}
          mapType={this.mapType}
          style={styles.map}
          initialRegion={region}
        >
          <UrlTile
            urlTemplate="http://c.tile.openstreetmap.org/{z}/{x}/{y}.png"
            zIndex={-1}
          />
        </MapView>
        {/* <View style={styles.buttonContainer}>
          <View style={styles.bubble}>
            <Text>Custom Tiles</Text>
          </View>
        </View> */}
      </View>
    );
  }
}

CustomTiles.propTypes = {
  provider: ProviderPropType,
};

const styles = StyleSheet.create({
  container: {
    position: 'absolute',
    top: 0,
    left: 0,
    right: 0,
    bottom: 0,
    justifyContent: 'flex-end',
    alignItems: 'center',
  },
  map: {
    position: 'absolute',
    top: 0,
    left: 0,
    right: 0,
    bottom: 0,
  },
  bubble: {
    flex: 1,
    backgroundColor: 'rgba(255,255,255,0.7)',
    paddingHorizontal: 18,
    paddingVertical: 12,
    borderRadius: 20,
  },
  latlng: {
    width: 200,
    alignItems: 'stretch',
  },
  button: {
    width: 80,
    paddingHorizontal: 12,
    alignItems: 'center',
    marginHorizontal: 10,
  },
  buttonContainer: {
    flexDirection: 'row',
    marginVertical: 20,
    backgroundColor: 'transparent',
  },
});

export { CustomTiles };