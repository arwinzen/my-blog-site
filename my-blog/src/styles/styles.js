import { Dimensions } from 'react-native';

export const BACKGROUND_COLOR = '#003f5c';
export const BUTTON_COLOR = '#fb5b5a';
export const TEXT_COLOR = '#fff';
export const SUB_COLOR = 'gray';

export const INPUT_STYLE = {
    padding: 15,
    backgroundColor: 'white',
    borderRadius: 20,
    width: '50%',
    margin: 20,
    marginTop: 20,
    marginBottom: 20,
    marginVertical: 20,
    marginHorizontal: 20,
}

export const AUTH_CONTAINER = {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    backgroundColor: '#003f5c'
}

export const LOGO = {
    fontWeight:"bold",
    fontSize:50,
    color:"#fb5b5a",
    marginBottom:15,
}

export const INPUT_VIEW = {
    width:"60%",
    backgroundColor:"#465881",
    borderRadius:25,
    height:50,
    marginBottom:20,
    justifyContent:"center",
    padding:20
}

export const INPUT_TEXT = {
    height:50,
    color:"white"
}

export const BUTTON_STYLE = {
    width:"60%",
    backgroundColor:"#fb5b5a",
    borderRadius:25,
    height:50,
    alignItems:"center",
    justifyContent:"center",
    marginTop:10,
    marginBottom:10,
}

export const BLOG_CONTAINER = {
    flex: 1,
    backgroundColor: '#003f5c',
}

export const TITLE_HEADER = {
    color: TEXT_COLOR,
    fontWeight: 'bold',
    fontSize: 30,
    marginTop: 15,
    marginBottom: 15
}

export const CARD_STYLE = {
    width: Dimensions.get("window").width - 40,
    height: 350,
    backgroundColor: "white",
    borderRadius: 10,
    marginBottom: 20,
    // justifyContent: "center",
    alignItems: "center",
    marginTop:10
}

export const CARD_TITLE = {
    fontSize: 20,
    padding: 10,
    fontWeight: 'bold'
}

export const BLOG_CARD_STYLE = {
    width: Dimensions.get("window").width - 40,
    height: Dimensions.get('window').height + 55,
    backgroundColor: "white",
    borderRadius: 10,
    marginBottom: 20,
    // justifyContent: "center",
    alignItems: "center",
    marginTop:10
}

export const CONTACT_CARD = {
    width: Dimensions.get("window").width - 30,
    height: Dimensions.get('window').height,
    backgroundColor: "white",
    borderRadius: 10,
    marginBottom: 20,
    justifyContent: "center",
    alignSelf: "center",
    marginTop:10,
    padding: 20
}