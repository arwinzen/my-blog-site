import React, { useContext } from "react";
import 'react-native-gesture-handler';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import ShowPost from "../Screens/ShowPost";
import Home from "../Screens/Home";
import { Button, TouchableOpacity, Text } from 'react-native';
import { AuthContext } from '../Providers/AuthProvider';

const Stack = createNativeStackNavigator();

export const AppStack = () => {
  const { logout } = useContext(AuthContext);
  return (
    <Stack.Navigator>
      <Stack.Screen name="Home" component={Home} 
        options = {{
          headerShown : false
        }}
        />
      <Stack.Screen name="ShowPost" component={ShowPost}
        options = {{
          headerBackTitleVisible : false,
          headerRight: () => (
            <TouchableOpacity onPress={() => logout()}>
              <Text>Log Out</Text>
            </TouchableOpacity>
          ),
          headerTitle: 'Post'
        }}
      />
    </Stack.Navigator>
  )
}