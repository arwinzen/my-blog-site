import React, { useState, useEffect, useContext } from "react";
import { StyleSheet, View, ActivityIndicator } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { AuthContext } from './Providers/AuthProvider';
import { AuthStack } from './Stacks/AuthStack';
import { AppStack } from './Stacks/AppStack';
import * as SecureStore from 'expo-secure-store';

export default function Routes() {
  const { user, setUser, login, logout } = useContext(AuthContext)
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    // check if the user is logged in or not
    SecureStore.getItemAsync('user')
      .then(userString => {
        if (userString) {
          // decode it
          // login();
          userObject = JSON.parse(userString)
          setUser(userObject);
        }
        setLoading(false);
      })
      .catch(err => {
        console.log(err);
      })
  }, []);

  if (loading) {
    return (
      <View style={{ flex: 1, alignItems: 'center', justifyContent: 'center' }}>
        <ActivityIndicator size="large" />
      </View>
    )
  }

  return (
    <NavigationContainer>
      {user ? <AppStack /> : <AuthStack />}
    </NavigationContainer>
  );
}