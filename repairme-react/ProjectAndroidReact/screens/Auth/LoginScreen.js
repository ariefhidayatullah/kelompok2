import React, { Component } from "react";
import AlertAsync from "react-native-alert-async";

import styles from "./LoginStyle";
import {Keyboard, Dimensions, Text, View, TextInput, TouchableWithoutFeedback, KeyboardAvoidingView, AsyncStorage, Alert} from 'react-native';
import { Button } from 'react-native-elements';
import baseUrl from '../../config/config';
import DialogManager, { ScaleAnimation, DialogContent } from 'react-native-dialog-component';
var {height, width} = Dimensions.get('window');


export default class LoginScreen extends React.Component {
  constructor(props) {
    super(props);

    AsyncStorage.getItem('name',(error,result) => {
      if(result) {
        this.setState({
          Name: result
        });
      }
    });

    this.state = {
      LoginMitra: [],
      LoginPelanggan: [],
      Name:'',
      Username: '',
      Password: '',
      isLoading: true
    };
  }

  render() {
    console.log(this.state.Name);
    let userAuth = this.state.Name.length;
    if (userAuth === 0) {
      return (
        <KeyboardAvoidingView style={styles.containerView} behavior="padding">
  
        <TouchableWithoutFeedback onPress={Keyboard.dismiss}>
          <View style={styles.loginScreenContainer}>
            <View style={styles.loginFormView}>
            <Text style={styles.logoText}>Repair Me</Text>
              <TextInput onChangeText={(user) => this.setState({ user })} placeholder="Username" placeholderColor="#c4c3cb" style={styles.loginFormTextInput} />
              <TextInput onChangeText={(pass) => this.setState({ pass })} placeholder="Password" placeholderColor="#c4c3cb" style={styles.loginFormTextInput} secureTextEntry={true}/>
              <Button
                buttonStyle={styles.loginButton}
                onPress={() => this.onLoginPress()} 
                title="Login Sebagai Mitra"
              />
              <Button
                buttonStyle={styles.loginButton}
                onPress={() => this.onLoginPressUser()} 
                title="Login Sebagai Pelanggan"
              />
              <Button
                buttonStyle={styles.fbLoginButton}
                onPress={() => this.onFbLoginPress()}
                title="Forget Password ?"
                titleStyle={({color: "black"})}
              />
            </View>
          </View>
        </TouchableWithoutFeedback>
        </KeyboardAvoidingView>
      );
    }else {
      const { navigate } = this.props.navigation;

        const myAction = async () => {

        const choice = await AlertAsync(
          'Alert',
          'Anda Telah Login',
          [
            {text: 'Ok', onPress: () => 'Ok'},
            {text: 'Cancel', onPress: () => Promise.resolve('Cancel')},
          ],
        );

        if (choice === 'Ok') {
          await navigate('User');
        }
        }
        return(
          myAction(),
          <View>
            <Text>Anda Telah Login</Text>
            <Button buttonStyle={styles.loginButton} onPress={ () => navigate('User')} title="Go to Profile" />
            <Button buttonStyle={styles.loginButton} onPress={ () => {AsyncStorage.setItem('name', ''); console.log(this.state.User);
            navigate('Home')}} title="Logout" />
          </View>
        );
    }
  }

  componentDidMount() {
    baseUrl.get('/api/mitra')
    .then((response) => {
        const LoginMitra = response.data;
        this.setState ({ LoginMitra });
        console.log(LoginMitra);
    })
    .catch((error) => {
        console.log(error);
    });
    baseUrl.get('/api/pelanggan')
    .then((response) => {
      const LoginPelanggan = response.data;
      this.setState({ LoginPelanggan });
      console.log(LoginPelanggan);
    })
  }

  saveData() {
    let username = this.state.user;
    let password = this.state.pass;

    this.setState({
      Username: username,
      Password: password,
    });
    console.log('Session Berhasil');
    AsyncStorage.setItem('name', username);
    }
  
  onLoginPress(){
    const { navigate } = this.state.navigation;
    const { LoginMitra } = this.state;
    const MitraAuth =  (
      LoginMitra.map(Mitras  => {
        console.log(Mitras);   
        if(this.state.user == Mitras._id){
          console.log('Success');
          this.saveData();
          console.log(this.state.user);
          navigate('User')
        }else{
          console.log(this.state.user);
          console.log('Failed');
          return(
            DialogManager.show({
              title: 'Failed',
              width: 400 ,
              titleAlign: 'center',
              animationDuration: 200,
              ScaleAnimation: new ScaleAnimation(),
              children: (
                <DialogContent>
                  <View>
                    <Text>
                      Failed To Login, Username atau Password Salah
                    </Text>
                  </View>
                </DialogContent>
              ),
            }, () => {
              console.log('callback - show');
            })
                );
        }
      })
    )
  }
  onLoginPressUser(){
    const { navigate } = this.props.navigation;
    const { LoginPelanggan } = this.state;
    const PelangganAuth =  (
      LoginPelanggan.map(pelanggan  => {
        console.log(pelanggan);   
    if(this.state.user == pelanggan._id){
      console.log('Success');
      this.saveData();
      console.log(this.state.user);
      navigate('User')
    }else{
      console.log(this.state.user);
      console.log('Failed');
      return(
        DialogManager.show({
          title: 'Failed',
          width: 400 ,
          titleAlign: 'center',
          animationDuration: 200,
          ScaleAnimation: new ScaleAnimation(),
          children: (
            <DialogContent>
              <View>
                <Text>
                  Failed To Login, Username atau Password Salah
                </Text>
              </View>
            </DialogContent>
          ),
        }, () => {
          console.log('callback - show');
        })
            );
    }
      })
    )
  }

  componentWillUnmount() {
  }

}