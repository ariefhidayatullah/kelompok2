import * as React from 'react';
import { Platform, StyleSheet, Text,View,ImageBackground,Image } from 'react-native';
import { ScrollView } from 'react-native-gesture-handler';

export default function HomeScreen() {
  return (
    <View style={styles.container}>
      <ScrollView style={styles.container} contentContainerStyle={styles.contentContainer}>
      
    <View style={styles.containerRepair}>
      <ImageBackground source={require('../../assets/images/fix.jpeg')} style={styles.repairimage}>
        <Text style={styles.TextPerbaiki}>Segera Perbaiki Sekarang</Text>
        <Text style={styles.ButtonRepair}> Repair Now !</Text>
      </ImageBackground>
    </View>
              {/* Kelebihan RepairMe */}
    <View style={({backgroundColor: "white"})}>
      <Text style={styles.TextKelebihan}>Kelebihan RepairMe</Text>
      <ScrollView horizontal={true} style={styles.container} contentContainerStyle={styles.contentContainer}>
    <View style={({width:350})}>
      <Image source={require('../../assets/images/icon/users.png')} style={styles.KelebihanIcon}/>
      <Text style={styles.TextJudulDeskripsi}>Banyak Mitra Terpercaya</Text>
      <Text style={styles.TextDeskripsi}>Mitra yang bergabung dengan kami sudah terpercaya, jika ada mitra yang tidak memenuhi
      peraturan yang sudah ditentukan oleh pihak RepairMe maka mitra tidak bisa melakukan pemasangan iklan lagi</Text>
    </View>
    <View style={({width:350})}>
      <Image source={require('../../assets/images/icon/waktu.png')} style={styles.KelebihanIcon}/>
      <Text style={styles.TextJudulDeskripsi}>Tepat Waktu</Text>
      <Text style={styles.TextDeskripsi}>Perbaikan Hp atau Laptop anda akan diselesaikan dengan jangka waktu yang sudah ditentukan 
      oleh mitra yang akan memperbaiki kerusakan Hp atau Laptop anda.</Text>
    </View>
    <View style={({width:350})}>
      <Image source={require('../../assets/images/icon/promo1.png')} style={styles.KelebihanIcon}/>
      <Text style={styles.TextJudulDeskripsi}>Banyak Promo</Text>
      <Text style={styles.TextDeskripsi}>Banyak Promo yang akan ditawarkan kepada Pelanggan maupun kepada Mitra</Text>
    </View>
      <View style={({width:350})}>
      <Image source={require('../../assets/images/icon/list1.png')} style={styles.KelebihanIcon}/>
      <Text style={styles.TextJudulDeskripsi}>Bergaransi</Text>
      <Text style={styles.TextDeskripsi}>Pelanggan dapat menggunakan garansi setelah perbaikan selesai</Text>
    </View>
      </ScrollView>
              {/* Cara Pengunaan */}
      <Text style={styles.TextKelebihan}>Bagaimana Cara Menggunakannya?</Text>
      <ScrollView horizontal={true} style={styles.container} contentContainerStyle={styles.contentContainer}>
    <View style={({width:350})}>
      <Image source={require('../../assets/images/icon/maps.png')} style={styles.KelebihanIcon}/>
      <Text style={styles.TextJudulDeskripsi}>Langkah Pertama</Text>
      <Text style={styles.TextDeskripsi}>Pilih Mitra dengan click salah satu lokasi maka profil mitra akan muncul</Text>
    </View>
    <View style={({width:350})}>
      <Image source={require('../../assets/images/icon/hp.png')} style={styles.KelebihanIcon}/>
      <Text style={styles.TextJudulDeskripsi}>Langkah Ke-dua</Text>
      <Text style={styles.TextDeskripsi}>pilih Merk dan Tipe Handphone atau Laptop anda yang rusak & pilih kerusakan Handphone atau Laptop</Text>
    </View>
    <View style={({width:350})}>
      <Image source={require('../../assets/images/icon/setuju.png')} style={styles.KelebihanIcon}/>
      <Text style={styles.TextJudulDeskripsi}>Langkah Ke-Tiga</Text>
      <Text style={styles.TextDeskripsi}>Pelanggan menunggu persetujuan dari Mitra</Text>
    </View>
      <View style={({width:350})}>
      <Image source={require('../../assets/images/icon/sepeda.png')} style={styles.KelebihanIcon}/>
      <Text style={styles.TextJudulDeskripsi}>Langkah Ke-Empat</Text>
      <Text style={styles.TextDeskripsi}>Setelah Mitra menyetujui permintaan maka, barang dikirim ke Mitra</Text>
    </View>
      </ScrollView>
      <View style={({width:350})}>
        <Image source={require('../../assets/images/mitra/foto_ktp/1499-c8c189b6fd48de4697ea10957022389e.jpg')} style={styles.KelebihanIcon}/>
        <Text style={styles.TextJudulDeskripsi}>Mitra ....</Text>
      </View>
    </View>
      </ScrollView>
    </View>
  );
}

HomeScreen.navigationOptions = {
  header: null,
};


const styles = StyleSheet.create({
  TextJudulDeskripsi: {
    color: "black",
    fontWeight: "bold",
    fontSize: 21,
    textAlign: "center",
    marginLeft: 20,
    marginRight: 20,
    marginTop: 30,
  },
  TextDeskripsi: {
    color: "black",
    fontSize: 21,
    textAlign: "center",
    marginLeft: 20,
    marginRight: 20,
    marginTop: 30,
  },
  KelebihanIcon: {
    alignItems: 'center',
    marginTop: 40,
    marginBottom: 20,
    marginLeft: 120,
    height: 120,
    width: 120
  },
  TextKelebihan: {
    color: "black",
    fontWeight: "bold",
    textAlign: "center",
    fontSize: 25,
    marginTop: 30,
  },
  TextPerbaiki: {
    color: "white",
    fontWeight: "bold",
    fontSize: 25,
    marginLeft: 150,
    marginTop: 73,
    marginBottom: 67,
  },
  ButtonRepair : {
    width : 100,
    alignItems: "center",
    marginLeft: 245,
    marginBottom: 10,
    borderRadius: 50,
    backgroundColor: "rgb(104,104,104)",
    color: "white",
    paddingLeft: 14,
    paddingTop: 4,
    paddingBottom: 3,
    borderWidth: 1
  },
  containerRepair: {
    height:350,
  },
  repairimage: {
    flex: 1,
    resizeMode: "cover",
    justifyContent: "center",
    backgroundColor: "rgba(0, 0, 0, .5)",
  },
  container: {
    flex: 1,
    color: '#fff',
    height: 400
  },
});
