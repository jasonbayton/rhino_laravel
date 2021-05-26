##Introduction

WLM, although being a very good tool for communication, suffers when it comes to adding multiple contacts. In a corporate environment where everyone relies on WLM, it is not useful to have to add each person in your address book one by one in WLM.  There is the import/export contacts feature. It is used for backing up your contacts and re-importing them, however still it does not take into account that you may need to create a new list from scratch and import it.

For those who are responsible for administering it, there’s a very simple way of creating a “template” for use when a new employee joins and/or a user loses all contacts. See below.

##Creating a contact list from scratch

The WLM contact list is based on XML. That is a fantastic bonus, as it makes life easier when it comes to creating a list. For creating a list via notepad, open notepad and insert the following code:

```
<?xml version="1.0"?>
  <messenger>
    <service name=".NET Messenger Service">
      <contactlist>
        <contact>contact1@domain.com</contact>
        <contact>contact2@domain.com</contact>
        <contact>contact3@domain.com</contact>

        ...

        <contact>contact20@domain.com</contact>
      </contactlist>
    </service>
  </messenger>
```

You can see as above that it works with tags. You may enter your email addresses between the <contact> and </contact>. Make as many of these as you’d like depending on how many contacts you have. This is useful for a small amount of contacts, say for instance in a department.

Save this document as a .CTT – you will notice that the icon of the file is a messenger icon.

[![image00](/wp-content/uploads/2009/10/image00.png)](/wp-content/uploads/2009/10/image00.png)

In WLM, go to the Contacts menu, and select **Import Messenger contacts**

[![image01](/wp-content/uploads/2009/10/image01.png)](/wp-content/uploads/2009/10/image01.png)

Select the .CTT that you created, and agree to importing X amount of contacts.

You will then find a whole list of contacts! Once you have been accepted by your colleagues, you will be able to start chatting.

For creating a very large list, remove  the entries “<contact>contact\*@domain.com</contact>”.

Export your Outlook contact list

[![image02](/wp-content/uploads/2009/10/image02.png)](/wp-content/uploads/2009/10/image02.png)

Select Export to file

[![image03](/wp-content/uploads/2009/10/image03.png)](/wp-content/uploads/2009/10/image03.png)

Choose Excel 97-2003

[![image04](/wp-content/uploads/2009/10/image04.png)](/wp-content/uploads/2009/10/image04.png)

Contacts (For best results, have your contacts organised so not to export people you don’t want in WLM)

[![image05](/wp-content/uploads/2009/10/image05.png)](/wp-content/uploads/2009/10/image05.png)

Select a Location

[![image06](/wp-content/uploads/2009/10/image06.png)](/wp-content/uploads/2009/10/image06.png)

Once this is done, please open the new .XLS file in Microsoft Excel

[![image07](/wp-content/uploads/2009/10/image07.png)](/wp-content/uploads/2009/10/image07.png)

You can extract all email data, removing the names and leaving only the addresses. Then create a new Excel workbook. In column A have <contact>, column B have the address and column C have </contact>

[![image08](/wp-content/uploads/2009/10/image08.png)](/wp-content/uploads/2009/10/image08.png)

Finally, copy/paste all of this data back into Notepad, and save it as a .CTT

[![image09](/wp-content/uploads/2009/10/image09.png)](/wp-content/uploads/2009/10/image09.png)

This will create a contact list which you can import into messenger as stated above. In WLM, go to the Contacts menu, and select **Import Messenger contacts**

[![image01](/wp-content/uploads/2009/10/image01.png)](/wp-content/uploads/2009/10/image01.png)

Select the .CTT that you created, and agree to importing X amount of contacts. You will then find a whole list of contacts! Once you have been accepted by your colleagues, you will be able to start chatting.
