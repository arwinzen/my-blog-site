import React, { useState, useEffect, useContext } from 'react';
import { 
    View, 
    Text, 
    Image,
    ActivityIndicator,
    ScrollView,
} 
from 'react-native';
import tw from 'twrnc';
import { 
  Inter_400Regular,
  Inter_500Medium,
  Inter_600SemiBold,
  Inter_700Bold,
  Inter_800ExtraBold,
  Inter_900Black 
} from '@expo-google-fonts/inter';
import { useFonts } from 'expo-font';
import AppLoading from 'expo-app-loading';
import axios, { thumbnail_URL } from '../axios_instance';
import { formatDistanceToNowStrict } from 'date-fns';
import { MarkdownView } from 'react-native-markdown-view';
import { AuthContext } from '../Providers/AuthProvider';

function ShowPost( { route } ){
    // let [fontsLoaded, error] = useFonts({
    //   Inter_400Regular,
    //   Inter_500Medium,
    //   Inter_600SemiBold,
    //   Inter_700Bold,
    //   Inter_800ExtraBold,
    //   Inter_900Black 
    // })

    // if (!fontsLoaded){
    //   return <AppLoading />
    // }

    console.log(route.params.id)
    const post_id = route.params.id;

    const { user, logout } = useContext(AuthContext);
    const [data, setData] = useState('');
    const [isLoading, setIsLoading] = useState(false);

    useEffect(() => {
        axios.defaults.headers.common['Authorization'] = `Bearer ${user.token}`;
        getPost();
    }, [])

    function getPost(){
        setIsLoading(true);
        axios.get(`/posts/${post_id}`)
        .then(response => {
            // console.log(response);
            setData(response.data);
            setIsLoading(false);
        })
        .catch(error => {
            console.log(error);
            setIsLoading(false);
        })
    }

    const renderLoader = () => {
        return(
          isLoading ?
            <View>
              <ActivityIndicator size="large" color="#aaa" />
            </View> : null
        );
      }

    return(
        <View style={tw.style(`bg-blue-900 h-full`, {backgroundColor: '#003f5c'})}>
            { isLoading ? (
              <View>
                <ActivityIndicator size="large" color="#aaa" />
              </View>
            ) : (
              <ScrollView style={tw`rounded bg-white mx-auto mt-3 mb-5 w-10/12`}>
                <Image 
                    source={{uri: `${thumbnail_URL}/${data.thumbnail}` }}
                    style={tw`w-78.1 h-48 rounded rounded-b-none`}
                />
                <View style={tw`flex-row items-center flex-wrap justify-between p-2`}>
                    <Text
                        style={ tw.style('text-2xl', {fontFamily: 'Inter_700Bold'})}
                    >
                        {data.title}
                    </Text>
                    <Text style={tw`text-xs`}>

                        { data.created_at ? 
                            (`${formatDistanceToNowStrict(new Date(data.created_at))} ago`) : ''
                        }
                    </Text>
                </View>
                
                <MarkdownView style={ tw.style('p-2 mb-2 text-sm', {fontFamily: 'Inter_500Medium'})}>
                    {data.body}
                </MarkdownView>
              </ScrollView>
            )}
        </View>
    )
}

export default ShowPost;