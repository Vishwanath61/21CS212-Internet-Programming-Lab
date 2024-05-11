package demo;

public class VishwaIpEx14Client 
{
    public static void main(String[] args) {
        //System.out.println(insert(111,"Vishwa",6100));
        System.out.println(edit(111,"Vishwanath",6100));        
    }

    private static String insert(int id, java.lang.String name, int amount) {
        demo.Db_Service service = new demo.Db_Service();
        demo.Db port = service.getDbPort();
        return port.insert(id, name, amount);
    }

    private static String edit(int id, java.lang.String name, int amount) {
        demo.Db_Service service = new demo.Db_Service();
        demo.Db port = service.getDbPort();
        return port.edit(id, name, amount);
    }    
}
