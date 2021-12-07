import React, { useContext, useState} from 'react';
import { AuthContext } from '../Providers/AuthProvider';
import axios from '../axios_instance';
import {
  SafeAreaView,
  StyleSheet,
  ScrollView,
  View,
  Text,
  StatusBar,
  TextInput,
  Button
} from 'react-native';
import { Formik, Field } from 'formik';
import * as yup from 'yup';
import CustomInput from '../components/CustomInput';

const loginValidationSchema = yup.object().shape({
    email: yup
      .string()
      .email("Please enter valid email")
      .required('Email Address is Required'),
    password: yup
      .string()
      .min(8, ({ min }) => `Password must be at least ${min} characters`)
      .required('Password is required'),
  })

const Login = ({ navigation }) => {
  const { login, error } = useContext(AuthContext);

  return (
    <>
      <StatusBar barStyle="dark-content" />
      <SafeAreaView style={styles.container}>
        <View style={styles.loginContainer}>
          <Text>Login Screen</Text>
          <Formik
            validationSchema={loginValidationSchema}
            initialValues={{ email: '', password: '' }}
            // onSubmit = {() => login(values.email, values.password)}
            onSubmit = {(values) => {login(values.email ,values.password)}}
            // // make axios call to authenticate user
            // onSubmit= {(values) => {
            //     axios.post('/sanctum/token', {
            //         email: values.email,
            //         password: values.password,
            //         device_name : 'mobile',
            //     })
            //     .then(response => {
            //         console.log(response.data.user.email, response.data.token)
            //     })
            //     .catch(error => {
            //         console.log(error.response)
            //     })
            // }}
            >
            {({
                handleSubmit,
                isValid,
            }) => (
                <>
                <Field
                  component={CustomInput}
                  name="email"
                  placeholder="Email Address"
                  keyboardType="email-address"
                />
            
                <Field
                  component={CustomInput}
                  name="password"
                  placeholder="Password"
                  secureTextEntry
                />
                <Button
                    onPress={handleSubmit}
                    title="LOGIN"
                    disabled={!isValid}
                />
                </>
            )}
            </Formik>
        </View>
      </SafeAreaView>
    </>
  )
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
  },
  loginContainer: {
    width: '80%',
    alignItems: 'center',
    backgroundColor: 'white',
    padding: 10,
    elevation: 10,
    backgroundColor: '#e6e6e6'
  },
  textInput: {
    height: 40,
    width: '100%',
    margin: 10,
    backgroundColor: 'white',
    borderColor: 'gray',
    borderWidth: StyleSheet.hairlineWidth,
    borderRadius: 10,
  },
  errorText: {
    fontSize: 10,
    color: 'red',
  },
})

export default Login