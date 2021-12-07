import React, { useState, useEffect, useContext } from 'react';
import { 
    SafeAreaView, 
    View, 
    FlatList, 
    Text, 
    TouchableOpacity,
    Image,
    ActivityIndicator,
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
import { AuthContext } from '../Providers/AuthProvider';
// import { MarkdownView } from 'react-native-markdown-view'

function Post({ item, onPress }) {
  let [fontsLoaded, error] = useFonts({
    Inter_400Regular,
    Inter_500Medium,
    Inter_600SemiBold,
    Inter_700Bold,
    Inter_800ExtraBold,
    Inter_900Black 
  })

  if (!fontsLoaded){
    return <AppLoading />
  }

  return (
    <TouchableOpacity onPress={onPress} style={tw`rounded mt-3 mb-4 items-center bg-white mx-auto w-5/6`}>
      <View>
        <Image 
            source={{uri: `${thumbnail_URL}/${item.thumbnail}` }}
            style={tw`w-78.1 h-48 rounded rounded-b-none`}
        />
        <View style={tw`flex-row items-center flex-wrap justify-between p-2`}>
          <Text
            style={ tw.style('text-xl', {fontFamily: 'Inter_700Bold'})}
          >
              {item.title}
          </Text>
          <Text style={tw`text-xs`}>
              {formatDistanceToNowStrict( new Date(item.created_at))} ago
          </Text>
        </View>
        
        <Text style={ tw.style('p-2 mb-2 text-sm', {fontFamily: 'Inter_500Medium'})}>
            {item.excerpt}
        </Text>
      </View>
    </TouchableOpacity>
  )
}

// home page displays a list of blog cards
function Home({ navigation }){
  // auth logic 
  const { user, logout } = useContext(AuthContext);
  const [name, setName] = useState(null);

  const [data, setData] = useState([]);
  const [currentPage, setPage] = useState(1);
  const [isLoading, setIsLoading] = useState(false);

  useEffect(() => {
    axios.defaults.headers.common['Authorization'] = `Bearer ${user.token}`;
    getAllPosts();
  }, [currentPage])

  function getAllPosts(){
    setIsLoading(true);
    axios.get(`/posts/?page=${currentPage}`)
      .then(response => {
        console.log(response.data.data);
        setData([...data , ...response.data.data]);
        setIsLoading(false);
      })
      .catch(error => {
        console.log(error);
        setIsLoading(false);
      })
  }

  function goToPost(index){
    navigation.navigate('ShowPost', {id: index});
  }
  
  const renderLoader = () => {
    return(
      isLoading ?
        <View>
          <ActivityIndicator size="large" color="#aaa" />
        </View> : null
    );
  }

  const loadNextPage = () => {
    setPage(currentPage + 1);
  }
  
  const renderPosts = ({ item }) => (
      <Post item={item} onPress={() => goToPost(item.id)} />
    );

    return (
      // <Text>Hi</Text>
      <SafeAreaView style={tw.style(`pb-20`, {backgroundColor: '#003f5c'})}>
        <View style={tw`flex-row items-center mx-auto w-10/12 justify-between`}>
          <Text style={tw`text-2xl text-white`}>Blog Posts</Text>
          <TouchableOpacity onPress={() => logout()}>
            <Text style={tw`text-white text-base`}>Log Out</Text>
          </TouchableOpacity>
        </View>
        <FlatList
          data={data}
          renderItem={renderPosts}
          // onPress={() => goToPost(item.id)}
          keyExtractor={item => item.id}
          ListFooterComponent={renderLoader}
          onEndReached={loadNextPage}
          onEndReachedThreshold={0}
          initialNumToRender={3}
          windowSize={2}
        />
      </SafeAreaView>
    );
}

export default Home;